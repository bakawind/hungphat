<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property integer $status
 * @property double $total
 */
class Orders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, phone, total', 'required'),
			array('id, status', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			array('name, email', 'length', 'max'=>128),
			array('address', 'length', 'max'=>256),
			array('phone', 'length', 'max'=>16),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, address, phone, status, total', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Họ tên',
			'email' => 'Email',
			'address' => 'Địa chỉ',
			'phone' => 'Điện thoại',
			'status' => 'Trạng thái',
			'total' => 'Tổng cộng',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($sortByTime = true)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('total',$this->total, true);
		$criteria->compare('created_date',$this->created_date,true);

		/*if($sortByTime == true){
			$criteria->defaultOrder='created_date desc';
		}*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
                'defaultOrder'=>'created_date DESC',
            ),
		));
	}

	public function getStatusName($status){
		$name;
		if($status == 0)
			$name = 'Mới';
		else if($status == 1)
			$name = 'Đang xử lý';
		else if($status == 2)
			$name = 'Đóng';
		return $name;
	}
}
