<?php

class SiteController extends Controller
{
	public $layout='//layouts/column1';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('deny',
				'actions'=>array('editAbout', 'editAdminEmail'),
				'users'=>array('?'),
			),
			array('allow',
				'actions'=>array('editAbout', 'editAdminEmail'),
				'users'=>array('admin'),
			),
			array('allow',
				'users'=>array('*'),
			),
		);
	}

    public function actionEditAbout()
    {
        $aboutFile = Yii::getPathOfAlias('aboutPath');
		if(isset($_POST['content'])) {
            $fn = fopen($aboutFile, 'w');
            fwrite($fn, $_POST['content']);
            fclose($fn);
            $this->redirect('/site/about');
        }
        $fn = fopen($aboutFile, 'r');
        $content = filesize($aboutFile) > 0 ? fread($fn, filesize($aboutFile)) : '';
        fclose($fn);
        $this->render('/site/editAbout', array('content'=>$content));
    }

    public function actionEditAdminEmail()
    {
        $emailFile = Yii::getPathOfAlias('emailPath');
        $emails = array();
		if(isset($_POST['email1']) && isset($_POST['email2'])) {
            $emails['email1'] = $_POST['email1'];
            $emails['email2'] = $_POST['email2'];
            $this->setEmail($emails);
            $this->redirect('/site/index');
        }
        $emails = $this->getEmail();
        $this->render('/site/editAdminEmail', array('emails'=>$emails));
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $criteria=new CDbCriteria();
        $criteria->order = 'modified_date DESC';
        $criteria->limit = 3;
		$news = Article::model()->findAll($criteria);
		$this->render('index', array('news'=>$news));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
                $model->body = $model->body.'\nEmail: '.$model->email;
                $model->body = $model->body.'\nPhone: '.$model->phone;
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				//mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Xin cám ơn quý khách. Chúng tôi sẽ liên lạc với quý khách trong thời gian sớm nhất.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionSearch(){
		if(isset($_GET['text'])){
			$searchValue = $_GET['text'];

			$criteria1=new CDbCriteria;
			$criteria1->addSearchCondition('title',$searchValue, true,'OR','LIKE');
			$criteria1->addSearchCondition('content',$searchValue, true,'OR','LIKE');
			$criteria1->order = "modified_date DESC";

			$articleResult = new CActiveDataProvider('Article', array(
			        'criteria'=>$criteria1,
                    'pagination'=>array(
                        'pageSize'=>3,
                    ),
		    ));


			$criteria2=new CDbCriteria;
			$criteria2->addSearchCondition('code',$searchValue, true,'OR','LIKE');
			$criteria2->addSearchCondition('name',$searchValue, true,'OR','LIKE');
			$criteria2->addSearchCondition('description',$searchValue, true,'OR','LIKE');
			$criteria2->order = "modified_date DESC";

			$productResult = new CActiveDataProvider('Products', array(
			        'criteria'=>$criteria2,
                    'pagination'=>array(
                        'pageSize'=>3,
                    ),
		    ));

			$this->render('searchResult', array('articleResult'=>$articleResult, 'productResult'=>$productResult));
		}
	}

	public function actionAbout(){
		$this->render('about');
	}

	public function actionYahoo(){
		return $this->renderPartial('yahoo');
	}

	public function actionArticle(){
		$this->render('article');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionAdmin() {
        $this->redirect('/orders/admin');
    }
}
