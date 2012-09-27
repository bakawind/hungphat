<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $address;
	public $phone;
	public $subject;
	public $body;
	//public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('email, phone, body', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'Họ tên',
			'email'=>'Email',
			'address'=>'Địa chỉ',
			'phone'=>'Điện thoại',
			'subject'=>'Tiêu đề',
			'body'=>'Nội dung',
		);
	}
}
