<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $date
 * @property string $photo
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return News the static model class
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
		return '{{news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, text, date', 'required'),
			array('title', 'length', 'max'=>255),
			array('visible', 'numerical', 'integerOnly'=>true),
                        array('photo', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true),
			array('text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, text, date, visible, photo', 'safe', 'on'=>'search'),
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
			'text' => 'Текст новости',
			'date' => 'Дата',
			'visible' => 'Видимость',
                        'photo' => 'Фото',
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
		$criteria->compare('text',$this->text,true);
		$criteria->compare('date',$this->date,true);
                $criteria->compare('photo',$this->photo,true);
		$criteria->compare('visible', ($this->visible=='') ? $this->visible : (($this->visible==Yii::t("yiinka", "Noactive")) ? 0 : 1), true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	/* Find news short list */
	
	public function findShortNews($limits)
	{
		return News::model()->findAll(array(
			'select'=>'id, title',
			'condition'=>'visible=:visible',
			'params'=>array(':visible'=>1),
			'limit'=>$limits,
			'order'=>'id DESC',
		));
	}
}