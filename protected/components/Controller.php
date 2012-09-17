<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    // Shopping Cart
    protected $_cart;
    public $emailRegex = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
    public $phoneRegex = '/\d{8,11}/';

    public function getCart()
    {
        // get the cart from session
        $this->_cart = Yii::app()->user->getState('cart');
        $cart = new Cart();
        // if the cart is not existed, create new one
        if ($this->_cart != null) {
            $this->_cart = $cart->loadJson($this->_cart);
        } else {
            $this->_cart = $cart;
        }
        return $this->_cart;
    }

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function getEmail()
    {
        $emailFile = Yii::getPathOfAlias('emailPath');
        $fn = fopen($emailFile, 'r');
        $email = filesize($emailFile) > 0 ? fread($fn, filesize($emailFile)) : '';
        fclose($fn);
        $email = json_decode($email, true);
        return $email;

    }

    public function setEmail($email)
    {
        $emailFile = Yii::getPathOfAlias('emailPath');
        if(isset($email) && is_array($email) && array_key_exists('email1', $email) && array_key_exists('email2', $email))
        {
            $email = json_encode($email);
            $fn = fopen($emailFile, 'w');
            fwrite($fn, $email);
            fclose($fn);
        }
    }
}
