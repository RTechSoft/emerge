<?php

class UserController extends Controller
{
	public function actionDashboard(){
		$userInfo = Users::model()->findByPk(Yii::app()->user->id);
		if(isset($_POST['update'])){
			$data['id'] = Yii::app()->user->id;
			$data['fname'] = $_POST['firstname'];
			$data['mname'] = $_POST['middlename'];
			$data['lname'] = $_POST['lastname'];
			$data['primary'] = $_POST['primary_username'];
			$data['secondary'] = $_POST['secondary_username'];
			$data['address1'] = $_POST['location1'];
			$data['address2'] = $_POST['location2'];
			$data['pword'] = $_POST['password'];
			Users::editUser($data);
			$this->redirect(array('user/dashboard'));
		}
		$this->render('dashboard',array('user'=>$userInfo));
	}
}