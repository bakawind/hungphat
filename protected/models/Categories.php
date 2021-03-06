<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $id
 * @property string $name
 * @property string $caption
 * @property string $banner
 * @property string $image
 */
class Categories extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Categories the static model class
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
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('caption', 'required'),
			array('name, caption', 'length', 'max'=>128),
			array('banner, image', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, caption, banner, image', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'caption' => 'Caption',
			'banner' => 'Banner',
			'image' => 'Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('caption',$this->caption,true);
		$criteria->compare('banner',$this->banner,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getBannerThumbnail(){
        if (!empty($this->banner) && $this->banner!='')
            return CHtml::image($this->banner, $this->caption, array('max-width'=>'300px','max-height'=>'200px'));
    }

	public function getImageThumbnail(){
        if (!empty($this->image) && $this->image!='')
            return CHtml::image($this->image, $this->caption, array('max-width'=>'300px','max-height'=>'200px'));
    }
	
	public function getCategoryCaption($id)
	{
		$model = $this->findByPk($id);
		return $model->caption;
	}
}
