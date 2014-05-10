<?php

/**
 * This is the model class for table "agencies".
 *
 * The followings are the available columns in table 'agencies':
 * @property integer $id
 * @property string $agency_username
 * @property string $agency_password
 * @property string $agency_name
 * @property string $agency_location
 * @property integer $agency_type
 * @property string $location_scope
 * @property integer $agency_verified
 * @property string $agency_photo
 */
class Agencies extends CActiveRecord
{
	private $_identity;
	public $rememberMe;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'agencies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('agency_username, agency_password, agency_name, agency_location, agency_type, location_scope, agency_verified, agency_photo', 'required'),
			array('agency_type, agency_verified', 'numerical', 'integerOnly'=>true),
			array('agency_username, agency_name, location_scope', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, agency_username, agency_password, agency_name, agency_location, agency_location2, agency_type, location_scope, agency_verified, agency_photo', 'safe', 'on'=>'search'),
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
			'agency_username' => 'Agency Username',
			'agency_password' => 'Agency Password',
			'agency_name' => 'Agency Name',
			'agency_location' => 'Lat',
			'agency_location2' => 'Lng',
			'agency_type' => 'Agency Type',
			'location_scope' => 'Location Scope',
			'agency_verified' => 'Agency Verified',
			'agency_photo' => 'Agency Photo',
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
		$criteria->compare('agency_username',$this->agency_username,true);
		$criteria->compare('agency_password',$this->agency_password,true);
		$criteria->compare('agency_name',$this->agency_name,true);
		$criteria->compare('agency_location',$this->agency_location,true);
		$criteria->compare('agency_location2',$this->agency_location2,true);
		$criteria->compare('agency_type',$this->agency_type);
		$criteria->compare('location_scope',$this->location_scope,true);
		$criteria->compare('agency_verified',$this->agency_verified);
		$criteria->compare('agency_photo',$this->agency_photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Agencies the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave() {
		$TPassword = new TPassword();
		$this->agency_password = $TPassword->hash($this->agency_password);
                                                                                                                                                                                                                                                                                                                                                                      
		return true;
	}

	public function login() {
		$TPassword = new TPassword();
		$this->setAttribute('agency_password', $TPassword->hash($this->agency_password));

		if($this->_identity===null) {
			$this->_identity = new UserIdentity($this->agency_username, $this->agency_password);
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
}
