<?php

class AgencyController extends Controller
{
	public function actionDashboard(){
		$agencyInfo = Agencies::model()->findByPk(Yii::app()->user->id);
		$this->render('index',array('agency'=>$agencyInfo));
	}

	public function actionProfile(){
		$agencyInfo = Agencies::model()->findByPk(Yii::app()->user->id);
		$agencyTypes = AgencyTypes::model()->findAll();
		$this->render('profile',array('agency'=>$agencyInfo,'types'=>$agencyTypes));
	}

	public function actionLogs() {
		$this->render('logs');
	}

	public function actionUpdate($id){
		$model = Agencies::model()->findByPk($id);

		$model->agency_name = $_POST['agency_name'];
		$model->agency_type = $_POST['agency_type'];
		$model->agency_location = $_POST['location1'];
		$model->agency_location2 = $_POST['location2'];
		$model->agency_username = $_POST['agency_username'];
		if(isset($_POST['agency_password'])){
			$TPassword = new TPassword();
			$password = $TPassword->hash($_POST['agency_password']);
			$model->agency_password = $password;
		}

		$model->save();
		$this->redirect(array('agency/profile'));
	}

	public function actionAssets(){
		$assetsInfo = AssetManager::model()->findAllByAttributes(array('agency_id'=>Yii::app()->user->id));
	}
}