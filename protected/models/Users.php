<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $primary_username
 * @property string $secondary_username
 * @property string $user_firstname
 * @property string $user_middlename
 * @property string $user_lastname
 * @property integer $user_mobile
 * @property string $user_password
 * @property string $user_address
 * @property integer $user_mobile_verification_code
 * @property integer $user_status
 * @property integer $registration_type
 * @property string $user_photo
 */
class Users extends CActiveRecord
{	
	private $_identity;
	public $rememberMe;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('primary_username, secondary_username, user_firstname, user_middlename, user_lastname, user_mobile, user_password, user_address, user_mobile_verification_code, user_status, registration_type, user_photo', 'required'),
			array('user_mobile_verification_code, user_status, registration_type', 'numerical', 'integerOnly'=>true),
			array('primary_username, secondary_username', 'length', 'max'=>255),
			array('user_firstname, user_middlename, user_lastname', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, primary_username, secondary_username, user_firstname, user_middlename, user_lastname, user_mobile, user_password, user_address, user_address2, user_mobile_verification_code, user_status, registration_type, user_photo', 'safe', 'on'=>'search'),
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
			'primary_username' => 'Primary Username',
			'secondary_username' => 'Secondary Username',
			'user_firstname' => 'User Firstname',
			'user_middlename' => 'User Middlename',
			'user_lastname' => 'User Lastname',
			'user_mobile' => 'User Mobile',
			'user_password' => 'User Password',
			'user_address' => 'Lat',
			'user_address2' => 'Lng',
			'user_mobile_verification_code' => 'User Mobile Verification Code',
			'user_status' => 'User Status',
			'registration_type' => 'Registration Type',
			'user_photo' => 'User Photo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('primary_username',$this->primary_username,true);
		$criteria->compare('secondary_username',$this->secondary_username,true);
		$criteria->compare('user_firstname',$this->user_firstname,true);
		$criteria->compare('user_middlename',$this->user_middlename,true);
		$criteria->compare('user_lastname',$this->user_lastname,true);
		$criteria->compare('user_mobile',$this->user_mobile,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_address',$this->user_address,true);
		$criteria->compare('user_address',$this->user_address2,true);
		$criteria->compare('user_mobile_verification_code',$this->user_mobile_verification_code);
		$criteria->compare('user_status',$this->user_status);
		$criteria->compare('registration_type',$this->registration_type);
		$criteria->compare('user_photo',$this->user_photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave() {
		$TPassword = new TPassword();
		$this->user_password = $TPassword->hash($this->user_password);

		return true;
	}

	public static function usernameChecker($username) {
		if(Users::model()->findByAttributes(array('primary_username'=>$username))){
			$username = 'mobile';
		} else if(Users::model()->findByAttributes(array('secondary_username'=>$username))){
			$username = 'username';
		} else {
			$username = 'agency';
		}

		return $username;
	}

	public function login() {
		$TPassword = new TPassword();
		$this->setAttribute('user_password', $TPassword->hash($this->user_password));

		if($this->_identity===null) {
			$this->_identity = new UserIdentity($this->primary_username, $this->user_password);
			$this->_identity->authenticate();
		}

		if($this->_identity->errorCode===UserIdentity::ERROR_NONE) {
			$duration=$this->rememberMe ? 3600*24*30 : 0;
			Yii::app()->user->login($this->_identity, $duration);
			return true;
		} else {
			return false;
		}
	}

	public static function editUser($data){
		$edit = self::model()->findByPk($data['id']);
		$edit->user_firstname = $data['fname'];
		$edit->user_middlename = $data['mname'];
		$edit->user_lastname = $data['lname'];
		$edit->primary_username = $data['primary'];
		$edit->secondary_username = $data['secondary'];
		$edit->user_password = $data['pword'];
		$edit->user_address = $data['address1'];
		$edit->user_address2 = $data['address2'];
		$edit->save();
	}
}
