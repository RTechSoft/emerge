<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function setFrontendTheme() {
		return Yii::app()->theme = 'cloud_frontend';
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index', array($this->setFrontendTheme()));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionRegister() {
		$modelUser = new Users;
		$modelAgency = new Agencies;

		if(isset($_POST['Users']) && isset($_POST['btnRegisterUser'])) {
			$modelUser->attributes = $_POST['Users'];

			if($modelUser->validate() && $modelUser->save()) {
				echo 'user registration success';
			} else {
				echo 'user registration failed';
			}
		}

		if(isset($_POST['Agencies']) && isset($_POST['btnRegisterAgency'])) {
			$modelAgency->attributes = $_POST['Agencies'];

			if($modelAgency->validate() && $modelAgency->save()) {
				echo 'agency registration success';
			} else {
				echo  'agency registration failed';
			}
		}

		$this->render('register', array('modelUser'=>$modelUser, 'modelAgency'=>$modelAgency));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$modelUsers = new Users;
		$modelAgencies = new Agencies;

		if(isset($_POST['Users']) && isset($_POST['btnLoginUser'])) {
			$modelUsers->attributes = $_POST['Users'];
			$modelUsers->user_password = $_POST['Users']['user_password'];

			if($modelUsers->validate() && $modelUsers->login()) {
				echo 'user login success';
			} else {
				echo 'user login failed';
			}
		}

		if(isset($_POST['Agencies']) && isset($_POST['btnLoginAgency'])) {
			$modelAgencies->attributes = $_POST['Agencies'];
			$modelAgencies->agency_password = $_POST['Agencies']['agency_password'];

			if($modelAgencies->validate() && $modelAgencies->login()) {
				$this->redirect(array('agency/dashboard'));
			} else {
				echo 'agency login failed';
			}
		}

		if(isset($_POST['Users']) && isset($_POST['btnRegisterUser'])) {
			$modelUsers->attributes = $_POST['Users'];
			$modelUsers->user_mobile = $_POST['Users']['primary_username'];
			$modelUsers->registration_type = 1;
			$modelUsers->user_password = $_POST['Users']['user_password'];

			if($modelUsers->validate() && $modelUsers->save()) {
				echo 'user registration success';
				$this->redirect('site/login');
			} else {
				echo 'user registration failed';
			}
		}

		if(isset($_POST['Agencies']) && isset($_POST['btnRegisterAgency'])) {
			$modelAgencies->attributes = $_POST['Agencies'];
			$modelAgencies->agency_password = $_POST['Agencies']['agency_password'];
			$modelAgencies->agency_type = 1;

			if($modelAgencies->validate() && $modelAgencies->save()) {
				echo 'user registration success';
				$this->redirect('site/login');
			} else {
				echo 'user registration failed';
			}
		}

		$this->render('login', array('modelUsers'=>$modelUsers, 'modelAgencies'=>$modelAgencies));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}