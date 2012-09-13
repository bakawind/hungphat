<?php

class ProductPhotosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $this->layout='//layouts/column2';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $this->layout='//layouts/column2';
		$model=new ProductPhotos;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductPhotos']))
		{
			$model->attributes=$_POST['ProductPhotos'];
			$myfile = CUploadedFile::getInstance($model,'tempFile'); // Hung - upload image code
			$model->tempFile=$myfile; // Hung - upload image code
			$model->url='temp'; //Hung - code tam - can url de luu xuong database
			if($model->save()){
				$model->url=''; //Hung - code tam - xoa blank url
				$this->updatePhoto($model, $myfile); // Hung - upload image code
				//$this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('products/view','id'=>$model->product_id)); // Hung - render to product view page
			}
		}

		if(isset($_GET['p_id'])){
			$model->product_id = $_GET['p_id'];
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $this->layout='//layouts/column2';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductPhotos']))
		{
			$model->attributes=$_POST['ProductPhotos'];
			$myfile = CUploadedFile::getInstance($model,'tempFile'); // Hung - upload image code
			$model->tempFile=$myfile; // Hung - upload image code
			if($model->save()){
				$this->updatePhoto($model, $myfile); // Hung - upload image code
				$this->redirect(array('products/view','id'=>$model->product_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel($id);
						
			$this->deleteImage($model->url);
			
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	public function deleteImage($imageURL){
		$fileIndex = strrpos($imageURL, "/", -1);
		$realFilename = substr($imageURL, $fileIndex);			
		unlink(Yii::getPathOfAlias('uploadPath') . "\\slider_photos\\" . $realFilename);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $this->layout='//layouts/column2';
		$dataProvider=new CActiveDataProvider('ProductPhotos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $this->layout='//layouts/column2';
		$model=new ProductPhotos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductPhotos']))
			$model->attributes=$_GET['ProductPhotos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=ProductPhotos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-photos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function updatePhoto($model, $myfile) {
	   if (is_object($myfile) && get_class($myfile)==='CUploadedFile') {
	   
			if($model->url!='' || $model->url!=null){
				$this->deleteImage($model->url);
			}
	   
			$nameOfFile = $model->tempFile->getName();
			$model->url= $model->id . '_' . $nameOfFile;
			
			$myfile->saveAs(Yii::getPathOfAlias('uploadPath') . '/slider_photos/' . $model->url); //upload picture to server
			$model->url=Yii::getPathOfAlias('uploadURL') . '/slider_photos/' . $model->url;
			$model->save();

			return true;
		 } else return false;
	}

}
