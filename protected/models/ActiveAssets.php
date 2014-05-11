<?php

/**
 * This is the model class for table "active_assets".
 *
 * The followings are the available columns in table 'active_assets':
 * @property integer $agency_id
 * @property integer $asset_id
 * @property integer $help_log_id
 * @property integer $quantity
 */
class ActiveAssets extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'active_assets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agency_id, asset_id, help_log_id, quantity', 'required'),
			array('agency_id, asset_id, help_log_id, quantity', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('agency_id, asset_id, help_log_id, quantity', 'safe', 'on'=>'search'),
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
			'agency_id' => 'Agency',
			'asset_id' => 'Asset',
			'help_log_id' => 'Help Log',
			'quantity' => 'Quantity',
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

		$criteria->compare('agency_id',$this->agency_id);
		$criteria->compare('asset_id',$this->asset_id);
		$criteria->compare('help_log_id',$this->help_log_id);
		$criteria->compare('quantity',$this->quantity);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ActiveAssets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getRemaining($id){
		$active = self::model()->findAllByAttributes(array('agency_id'=>Yii::app()->user->id, 'asset_id'=>$id));
		$total = 0;
		foreach($active as $value){
			$total = $total+$value->quantity;
		}
		return $total;

	}
}
