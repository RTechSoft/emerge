<?php

class AgencyController extends Controller
{
	public function filters() {
		return array(
			'accessControl',
		);
	}

	public function accessRules() {
		return array(
			array(
				'allow',
				'actions'=>array('dashboard','profile','logs','update','assets','setAssets','respond'),
				'expression'=>function(){
					if(Yii::app()->user->isGuest){
						return false;
					}

					if(Yii::app()->user->userType == 1) {
						return  false;
					}

					return true;
				}
			),
			array('deny'),
		);
	}

	public function actionDashboard(){
		$agencyInfo = Agencies::model()->findByPk(Yii::app()->user->id);
		if($agencyInfo->agency_location != ""){
			$this->render('index',array('agency'=>$agencyInfo));	
		}else{
			$this->redirect(array('agency/profile'));
		}
	}

	public function actionProfile(){
		$agencyInfo = Agencies::model()->findByPk(Yii::app()->user->id);
		$agencyTypes = AgencyTypes::model()->findAll();
		$this->render('profile',array('agency'=>$agencyInfo,'types'=>$agencyTypes));
	}

	public function actionLogs() {
		// $model = Yii::app()->db->createCommand()
		// 	->select('users.user_firstname as firstname, users.user_lastname as lastname, agencies.agency_name, help_logs.response_date, help_logs.status')
		// 	->from('help_logs')
			->leftJoin()
		$model = HelpLogs::model()->findAllByAttributes(array('agency_id'=>Yii::app()->user->id));
		
		$this->render('logs', array('model'=>$model));
	}

	public function actionUpdate($id){
		$model = Agencies::model()->findByPk($id);

		$model->agency_name = $_POST['agency_name'];
		$model->agency_type = $_POST['agency_type'];
		$model->agency_location = $_POST['location1'];
		$model->agency_location2 = $_POST['location2'];
		$model->agency_username = $_POST['agency_username'];
		$TPassword = new TPassword();
		$model->agency_password = $TPassword->hash($_POST['agency_username']);

		$model->save();
		$this->redirect(array('agency/profile','respond'=>true));
	}

	public function actionAssets(){
		$assetsInfo = AssetManager::model()->findAllByAttributes(array('agency_id'=>Yii::app()->user->id));
	}

	public function actionSetAssets($id){
		$assetsInfo = AssetManager::model()->findAllByAttributes(array('agency_id'=>Yii::app()->user->id));
		$this->render('set',array('assets'=>$assetsInfo));
	}

	public function actionRespond($id){
		HelpLogs::respondToRequest($id,$_POST);
		$this->redirect(array('agency/dashboard','respond'=>true));
	}
}