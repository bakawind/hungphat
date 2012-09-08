<?php

class CartController extends Controller
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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index', array('cart'=>$this->getCart()));
	}

    public function actionAdd($id)
    {
        if(isset($id) && $id!=null){
            $product = Products::model()->findByPk($id);
            if($product != null){
                $this->getCart()->addToCart($id);
            }
        }
        // TODO: change this url
        $this->redirect('/cart/index');
    }

    public function actionUpdate()
    {
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        if($id!=null){
            $this->getCart()->changeQuantity($id, $quantity);
        }
        $this->redirect('/cart/index');
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

    public function actionCreateOrder()
    {
        $attributes = array();
        $errors = array();

        $attributes['name'] = isset($_POST['name']) ? trim($_POST['name']) : null;
        $attributes['email'] = isset($_POST['email']) ? trim($_POST['email']) : null;
        $attributes['address'] = isset($_POST['address']) ? trim($_POST['address']) : null;
        $attributes['phone'] = isset($_POST['phone']) ? trim($_POST['phone']) : null;

        foreach($attributes as $key=>$value){
            if($value === null || $value==='') {
                $errors[$key] = 'Vui lòng nhập '.$key;
            } else {
                if($key == 'email' && !preg_match($this->emailRegex, $value)) $errors['email'] = 'Địa chỉ email không hợp lệ';
                if($key == 'phone' && !preg_match($this->phoneRegex, $value)) $errors['phone'] = 'Số điện thoại không hợp lệ';
            }
        }

        if(sizeof($errors) != 0) {
		    return $this->render('index', array('cart'=>$this->getCart(), 'errors'=>$errors, 'attributes'=>$attributes));
        }

        $order = new Orders;
        $order->attributes = $attributes;
        $order->created_date= "" . date("Y/m/d H:i:s");
        $order->total= $this->getCart()->getTotal();
        if($order->save()){
            $this->getCart()->emptyCart();
		    $this->redirect('/orders/view/'.$order->id);
        } else {
            foreach($order->errors as $e){
                foreach($e as $key=>$value){
                    $error[$key] = $value;
                }
            }
		    return $this->render('index', array('cart'=>$this->getCart(), 'errors'=>$errors));
        }
    }
}
