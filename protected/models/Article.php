<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $modified_date
 */
class Article extends CActiveRecord
{
	var $tempFile;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
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
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content', 'required'), //Hung - remove requirement for id column			
			array('title', 'length', 'max'=>128),
			array('image', 'length', 'max'=>256),
			array('modified_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, modified_date, image', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'content' => 'Content',
			'modified_date' => 'Modified Date',
			'image' => 'Image',
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
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('image',$this->image,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}