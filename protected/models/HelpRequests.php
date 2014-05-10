<?php

/**
 * This is the model class for table "help_requests".
 *
 * The followings are the available columns in table 'help_requests':
 * @property integer $id
 * @property integer $sender_number
 * @property string $sender_location
 * @property string $respondents
 * @property string $location_scope
 * @property integer $status
 */
class HelpRequests extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'help_requests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sender_number, status', 'required'),
			array('sender_number, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sender_number, sender_location, alternate_location, location_scope, sender_location2, status', 'safe', 'on'=>'search'),
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
			'sender_number' => 'Sender Number',
			'sender_location' => 'Sender Location',
			'sender_location2' => 'Sender Location2',
			'location_scope' => 'Location Scope',
			'alternate_location' => 'Alternate Location',
			'status' => 'Status',
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
		$criteria->compare('sender_number',$this->sender_number);
		$criteria->compare('sender_location',$this->sender_location,true);
		$criteria->compare('sender_location2',$this->sender_location2,true);
		$criteria->compare('location_scope',$this->location_scope,true);
		$criteria->compare('alternate_location',$this->alternate_location,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HelpRequests the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
