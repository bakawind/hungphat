<?php

class OrderItemsController extends Controller
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
		$model=new OrderItems;
		$errors = array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OrderItems']))
		{
			$model->attributes=$_POST['OrderItems'];			
			$productModel = Products::model()->find('code = :_code', array(':_code'=>$model->product_code));
			$orderModel = Orders::model()->findByPk($model->order_id);						
						
					
			if($model->validate() && $productModel != null){			
				$model->product_id = $productModel->id;						
				$existingItemModel = OrderItems::model()->find('product_id=:product_id AND order_id=:order_id',
																	array(':product_id'=>$productModel->id,
																			':order_id'=>$model->order_id,
																	)); 
				if($existingItemModel != null){ // if existing, inscrease the quantity of existing model and save										
					$oldQuantity = $existingItemModel->quantity;
					$newQuantity = $model->quantity;
					$existingItemModel->quantity = $oldQuantity + $newQuantity;					
					$existingItemModel->update();					
				}else{ // else, save the new item with new details					
					$flag = $model->insert();					
				}							
				$tempTotal = $orderModel->total;
				$orderModel->total = $tempTotal + ($productModel->price * $model->quantity);	
				$orderModel->save();				
				$this->redirect(array('orders/view','id'=>$model->order_id)); //redirect to the orders view details
			}else if($productModel == null && $model->product_code != null){				
				$model->addError('product_code','The Product Code is wrong');				
			}
		}

		if(isset($_POST['o_id'])){
			$model->order_id = $_POST['o_id'];
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
		
		$productModel = Products::model()->findByPk($model->product_id);
		$model->product_code = $productModel->code;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OrderItems']))
		{
			$model->attributes=$_POST['OrderItems'];
			$oldModel = $this->loadModel($id);
			$orderModel = Orders::model()->findByPk($model->order_id);
			
			$newQuantity = $model->quantity;
			$oldQuantity = $oldModel->quantity;
			$tempTotal = $orderModel->total;			
						
			$orderModel->total = $tempTotal + ($productModel->price * ($newQuantity - $oldQuantity));			
			if($model->save() && $orderModel->save())
				$this->redirect(array('orders/view','id'=>$model->order_id));
				//$this->redirect(array('view','id'=>$model->id));
				
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
			$model = $this->loadModel($id);
			// we only allow deletion via POST request
			$productModel = Products::model()->findByPk($model->product_id);
			$orderModel = Orders::model()->findByPk($model->order_id);
			
			$tempTotal = $orderModel->total;
			$orderModel->total = $tempTotal - ($productModel->price * $model->quantity);
			
			$orderModel->save();			
			$model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
				//$this->render(array('orders/view','id'=>$model->order_id));			
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
		$dataProvider=new CActiveDataProvider('OrderItems');
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
		$model=new OrderItems('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrderItems']))
			$model->attributes=$_GET['OrderItems'];

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
		$model=OrderItems::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-items-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
