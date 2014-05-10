<?php

class UserController extends Controller
{
	public function actionDashboard(){
		$userInfo = Users::model()->findByPk(Yii::app()->user->id);
		$this->render('dashboard',array('user'=>$userInfo));
	}
}