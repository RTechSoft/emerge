<?php

/**
 * This is the model class for table "help_logs".
 *
 * The followings are the available columns in table 'help_logs':
 * @property integer $id
 * @property integer $request_id
 * @property integer $agency_id
 * @property string $response_date
 */
class HelpLogs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'help_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('request_id, agency_id, response_date', 'required'),
			array('request_id, agency_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, request_id, agency_id, response_date, status', 'safe', 'on'=>'search'),
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
			'request_id' => 'Request',
			'agency_id' => 'Agency',
			'response_date' => 'Response Date',
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
		$criteria->compare('request_id',$this->request_id);
		$criteria->compare('agency_id',$this->agency_id);
		$criteria->compare('response_date',$this->response_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HelpLogs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function respondToRequest($id,$assets){
		$requestData = HelpRequests::model()->findByPk($id);
		for($counter = 0; $counter < sizeOf($assets['asset']); $counter++){
			$modelAsset = new ActiveAssets();
			$modelAsset->agency_id = Yii::app()->user->id;
			$modelAsset->asset_id = $assets['id'][$counter];
			$modelAsset->help_log_id = $id;
			$modelAsset->quantity = $assets['asset'][$counter];

			$modelAsset->save();

		}
		$model = new HelpLogs();

		$model->request_id = $id;
		$model->agency_id = Yii::app()->user->id;
		$model->status = 0;

		if($model->save()){
			$user = Users::model()->findByAttributes(array('sender_number'=>$requestData->sender_number));
			$firebase = new Firebase('https://emerge.firebaseio.com/', '3lyQRefcRqTwtRVvkwHwYK8VxXpyJ0KiBe1RaK5b');

			$firebase->set('logs/'.$model->id.'/requester', $user->user_firstname . ' ' . $user->user_lastname);
			$firebase->set('logs/'.$model->id.'/requester_contact', $user->primary_username);
			$firebase->set('logs/'.$model->d.'/agency_id', $model->agency_id);
		}
	}
}
