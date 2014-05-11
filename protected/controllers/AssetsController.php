<?php

class AssetsController extends Controller
{
	
	public function actionIndex()
	{

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$list = AssetManager::listAssets(Yii::app()->user->id);
		
		$this->render('index', array('list'=>$list));
	}

}