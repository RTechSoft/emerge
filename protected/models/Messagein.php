<?php

/**
 * This is the model class for table "messagein".
 *
 * The followings are the available columns in table 'messagein':
 * @property integer $Id
 * @property string $SendTime
 * @property string $ReceiveTime
 * @property string $MessageFrom
 * @property string $MessageTo
 * @property string $SMSC
 * @property string $MessageText
 * @property string $MessageType
 * @property string $MessagePDU
 * @property string $Gateway
 * @property string $UserId
 * @property integer $Status
 */
class Messagein extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'messagein';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Status', 'numerical', 'integerOnly'=>true),
			array('MessageFrom, MessageTo, SMSC, Gateway, UserId', 'length', 'max'=>80),
			array('MessageType', 'length', 'max'=>20),
			array('SendTime, ReceiveTime, MessageText, MessagePDU', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, SendTime, ReceiveTime, MessageFrom, MessageTo, SMSC, MessageText, MessageType, MessagePDU, Gateway, UserId, Status', 'safe', 'on'=>'search'),
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
			'Id' => 'ID',
			'SendTime' => 'Send Time',
			'ReceiveTime' => 'Receive Time',
			'MessageFrom' => 'Message From',
			'MessageTo' => 'Message To',
			'SMSC' => 'Smsc',
			'MessageText' => 'Message Text',
			'MessageType' => 'Message Type',
			'MessagePDU' => 'Message Pdu',
			'Gateway' => 'Gateway',
			'UserId' => 'User',
			'Status' => 'Status',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('SendTime',$this->SendTime,true);
		$criteria->compare('ReceiveTime',$this->ReceiveTime,true);
		$criteria->compare('MessageFrom',$this->MessageFrom,true);
		$criteria->compare('MessageTo',$this->MessageTo,true);
		$criteria->compare('SMSC',$this->SMSC,true);
		$criteria->compare('MessageText',$this->MessageText,true);
		$criteria->compare('MessageType',$this->MessageType,true);
		$criteria->compare('MessagePDU',$this->MessagePDU,true);
		$criteria->compare('Gateway',$this->Gateway,true);
		$criteria->compare('UserId',$this->UserId,true);
		$criteria->compare('Status',$this->Status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Messagein the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function listMessageIn(){
		$query = Yii::app()->db->createCommand()
				->from('messagein')
				->where('Status = 0')
				->andWhere('MessageFrom != "GLOBE"')
				->queryAll();
		return $query;
	}
	
	public static function sendSms($message,$num){
		$url = "http://localhost:9710/http/send-message?to=".$num."&message=".$message."&gateway=Emerge";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		$result = json_decode(curl_exec($ch),TRUE);
		curl_close($ch);
		return $result;
	}

	public static function updateSmsStatus($id){
		$updateStatus = Messagein::model()->findByAttributes(array('Id'=>$id));
		$updateStatus->Status=1;
		$updateStatus->save();
	}

	//users.php
	public static function signUpUserFromMobile($value){
		$mobileSignUp = new Users();
		$mobileSignUp->primary_username = $value['number'];
		$mobileSignUp->user_password = "1234";
		$mobileSignUp->user_firstname = $value['fname'];
		$mobileSignUp->user_lastname = $value['lname'];
		$mobileSignUp->registration_type = 2;
		$mobileSignUp->user_mobile = $value['number'];
		$mobileSignUp->save();

	}
	//end

	//helprequest.php
	public static function addHelpRequest($value){
		$help = new HelpRequests();

		$help->sender_number = $value['number'];
		$firebase->set('sender_number', $help->sender_number);

		$help->location_scope = $value['location_scope'];
		if($value['sender_location']){
			$help->sender_location = $value['sender_location'];
		}
		if($value['alt_location']){
			$help->alt_location = $value['alt_location'];
		}
		$help->status = 0;
		if($help->save()){
			$firebase = new Firebase('https://emerge.firebaseio.com/', '3lyQRefcRqTwtRVvkwHwYK8VxXpyJ0KiBe1RaK5b');

			$user = Users::model()->findByAttributes(array('sender_number'=>$help->sender_number));
			
			if($user) {
				$firebase->set('requests/'.$help->id.'/name', $user->user_firstname . ' ' . $user->user_lastname);
			} else {
				$firebase->set('requests/'.$help->id.'/name', "Anonymous");
			}

			$firebase->set('requests/'.$help->id.'/sender_number',  $help->sender_number);
			$firebase->set('requests/'.$help->id.'/location_scope', $help->location_scope);

			if($help->sender_location) {
				$firebase->set('requests/'.$help->id.'/sender_location', $help->sender_location);
			}

			if($help->alt_location) {
				$firebase->set('requests/'.$help->id.'/alt_location', $help->alt_location);
			}
		}


	}
	//end

	//helplogs.php
	public static function completeHelpLog($id){
		$updateStatus = HelpLogs::model()->findByPk($id);
		$updateStatus->status=1;
		$updateStatus->save();
	}
	//end

}
