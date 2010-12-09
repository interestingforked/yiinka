<?php

/**
 * This is the model class for table "primex_users".
 *
 * The followings are the available columns in table 'primex_users':
 * @property integer $id
 * @property string $name
 * @property string $password
 * @property string $email
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Users the static model class
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
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email', 'required'),
			array('password', 'required', 'on'=>'insert'),
			array('name, password, email', 'length', 'max'=>128),
			array('visible', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, password, email, visible', 'safe', 'on'=>'search'),
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
			'name' => 'Имя',
			'password' => 'Пароль',
			'email' => 'Email',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('visible',$this->visible,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function validatePassword($password, $salt)
    {
        return $this->hashPassword($password, $salt)===$this->password;
    }
 
    public function hashPassword($password, $salt)
    {
        return md5($salt.$password);
    }
	
	/* salt generation */
	
	public function randomSalt($length=32)
    {
        $chars = "023456789abcdefghijkmnopqrstuvwxyz";
        srand((double)microtime()*1000000);
        $i = 1;
        $salt = '' ;

        while ($i <= $length)
        {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $salt .= $tmp;
            $i++;
        }
        return $salt;
    }
	
	// get salt for update password
	
	public function findUserParams($userId)
	{
		return self::model()->find(array(
			'select'=>'salt',
			'condition'=>'id=:id AND visible=:visible',
			'params'=>array(':id'=>$userId, ':visible'=>1),
		));
	}
}