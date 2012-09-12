<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property double $price
 * @property string $description
 * @property string $image
 * @property string $modified_date
 * @property integer $category_id
 */
class Products extends CActiveRecord
{
	//Hung - add new property
	
	var $tempFile;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
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
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, name', 'required'), //Hung - remove id column from requirement
			array('id, category_id, available', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('code', 'length', 'max'=>64),
			array('name', 'length', 'max'=>128),
			array('image', 'length', 'max'=>256),
			array('description, modified_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, name, price, description, image, modified_date, category_id, available', 'safe', 'on'=>'search'),
		);
	}
	
	public function getThumbnail(){ // Hung - get thumbnail for photo
         // here i return the image
            if (!empty($this->image) && $this->image!='')
             return CHtml::image($this->image,'text_' . $this->image,array('width'=>'300px','max-height'=>'200px'));			 
        }
		
		
	public function getPath(){ //Hung - get path for photo
        $path=Yii::getPathOfAlias('uploadPath') . '/';            
		return $path;
           
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
			'code' => 'Code',
			'name' => 'Name',
			'price' => 'Price',
			'description' => 'Description',
			'image' => 'Image',
			'modified_date' => 'Modified Date',
			'category_id' => 'Category',
			'available' => 'Available',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('available',$this->available,true);
		
		if($sortByTime == true){
			$criteria->order='modified_date desc';
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getProductCode($id)
	{
		$productModel = Products::model()->findByPk($id);
		return $productModel->code;
	}
}