<?php

/**
 * This is the model class for table "asset_manager".
 *
 * The followings are the available columns in table 'asset_manager':
 * @property integer $id
 * @property integer $agency_id
 * @property string $asset
 * @property integer $quantity
 */
class AssetManager extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asset_manager';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agency_id, asset, quantity', 'required'),
			array('agency_id, quantity', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, agency_id, asset, quantity', 'safe', 'on'=>'search'),
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
			'agency_id' => 'Agency',
			'asset' => 'Asset',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('agency_id',$this->agency_id);
		$criteria->compare('asset',$this->asset,true);
		$criteria->compare('quantity',$this->quantity);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AssetManager the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function listAssets($id){
		$model = Yii::app()->db->createCommand()
			->select('*')
			->from('asset_manager')
			->where('agency_id = :id',array(':id'=>$id))
			->queryAll();

		return $model;
	}

	public static function addAssets($id,$asset,$quantity){
		$checkIfExist = AssetManager::model()->findByAttributes(array('asset'=>$asset,'agency_id'=>$id));
		if ($checkIfExist) {
			$checkIfExist->quantity += $quantity;
			$checkIfExist->save();
		}
		else{
			$query = new AssetManager();
			$query->agency_id = $id;
			$query->asset = $asset;
			$query->quantity = $quantity;
			$query->save();
		}
	}

	public static function editAssets($id,$asset,$quantity){
		$query = AssetManager::model()->findByPk($id);
		$query->assets = $asset;
		$query->quantity = $quantity;
		$query->save();
	}

}
