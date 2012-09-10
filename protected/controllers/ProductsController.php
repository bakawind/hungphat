<?php

class ProductsController extends Controller
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
				'actions'=>array('index','view', 'list', 'display', 'SearchPrice'),
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
			'photoData'=>$this->loadPhotoData($id),
		));
	}

    public function actionList(){
        if (isset($_GET['type'])){
            $type = $_GET['type'];
            $category = Categories::model()->find('name=:name', array(':name'=>$type));

            if (isset($category)){
		        $criteria=new CDbCriteria;
		        $criteria->compare('category_id',$category->id);
				$criteria->order='modified_date desc';
		        $dataProvider = new CActiveDataProvider('Products', array(
			        'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>6,
                    ),
		        ));
                $this->render('list', array('dataProvider'=>$dataProvider));
            }else{
				$error='Category không tồn tại';
				$this->render('../site/error',array('code'=>$error));
			}
        }
    }
	
	public function actionSearchPrice(){
		
		if (isset($_GET['type'])){
            $type = $_GET['type']; 		
			$rangeID = $_GET['range'];
			$category = Categories::model()->find('name=:name', array(':name'=>$type));		
			$priceRange = PriceRange::model()->findByPk($rangeID);

            if (isset($category) && isset($priceRange)){
		        $criteria=new CDbCriteria;
				$criteria->condition='price >=' . $priceRange->from_price . ' AND price <=' . $priceRange->to_price;
		        $criteria->compare('category_id',$category->id);
				$criteria->order='price desc';
		        $dataProvider = new CActiveDataProvider('Products', array(
			        'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>6,
                    ),
		        ));
                $this->render('list', array('dataProvider'=>$dataProvider));
            }else{
				$error='Price Range không tồn tại';
				$this->render('../site/error',array('code'=>$error));
			}
        }
	}

	public function actionDisplay($id){

		$model = $this->loadModel($id);

		$category = Categories::model()->find('id=:id', array(':id'=>$model->category_id));
		$criteria=new CDbCriteria;
		$criteria->compare('category_id',$category->id);
		$dataProvider = new CActiveDataProvider('Products', array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>6,
			),
		));

		$this->render('display',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
			'photoData'=>$this->loadPhotoData($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $this->layout='//layouts/column2';
		$model=new Products;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			$myfile = CUploadedFile::getInstance($model,'tempFile'); // Hung - upload image code
			$model->tempFile=$myfile; // Hung - upload image code
			$model->modified_date= $this->getCurrentDate();

			if($model->save()){
				$this->updatePhoto($model, $myfile); // Hung - upload image code
			}
			$this->redirect(array('admin'));//Hung - redirect to Products admin page
				//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function getCurrentDate(){ //Hung - get current date for modifying record
		$currentDate = "" . date("Y/m/d H:i:s");
		return $currentDate;
	}

	/*--------------
	* Upload and crunch an image Hung-code
	----------------*/
	public function updatePhoto($model, $myfile ) {
	   if (is_object($myfile) && get_class($myfile)==='CUploadedFile') {
			$ext = $model->tempFile->getExtensionName();
			$nameOfFile = $model->tempFile->getName();
			$model->image= $model->id . '_' . $nameOfFile;

			$model->tempFile->saveAs($model->getPath(). '/products/' . $model->image);
			$model->image=Yii::getPathOfAlias('uploadURL') . '/products/' . $model->image;
			$model->save();

			return true;
		 } else return false;
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

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			$myfile = CUploadedFile::getInstance($model,'tempFile'); // Hung - upload image code
			$model->tempFile=$myfile; // Hung - upload image code
			$model->modified_date= $this->getCurrentDate();

			if($model->save()){
				$this->updatePhoto($model, $myfile); // Hung - upload image code
				$this->redirect(array('view','id'=>$model->id));
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
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $this->layout='//layouts/column2';
		$dataProvider=new CActiveDataProvider('Products');
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
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

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
		$model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadPhotoData($id) // Hung - load Photo according to product id
	{
		$photoData = ProductPhotos::model()->searchBy($id);

		if($photoData===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $photoData;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
