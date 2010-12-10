<?php

/**
 * This is the model class for table "primex_pages".
 *
 * The followings are the available columns in table 'primex_pages':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $meta_title
 * @property string $keywords
 * @property string $description
 * @property integer $parent
 * @property integer $number
 * @property string $url
 */
class Pages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pages the static model class
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
		return '{{pages}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, url', 'required'),
			array('parent, number, visible', 'numerical', 'integerOnly'=>true),
			array('title, meta_title, url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, meta_title, keywords, description, parent, number, url, visible', 'safe', 'on'=>'search'),
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
			'id' => 'id',
			'title' => 'Название',
			'content' => 'Контент',
			'meta_title' => 'Meta Title',
			'keywords' => 'Keywords',
			'description' => 'Description',
			'parent' => 'Родительская страница',
			'number' => 'Порядковый номер',
			'url' => 'Url',
			'visible' => 'Видимость',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('number',$this->number);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('visible',$this->visible,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	/* Create Top Menu */
	
	public function findTopMenu($parentPage)
	{
		return self::model()->findAll(array(
			'select'=>'id, title, url, meta_title',
			'condition'=>'parent=:parent AND visible=:visible',
			'params'=>array(':parent'=>$parentPage, ':visible'=>1),
		));
	}
}