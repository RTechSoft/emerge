<?php

class AssetsController extends Controller
{
	
	public function actionIndex()
	{

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$list = AssetManager::listAssets(Yii::app()->user->id);
		if($_POST['add']){
			AssetManager::addAssets(Yii::app()->user->id,$_POST['asset'],$_POST['quantity']);
			$this->redirect(array('assets/index'));
		}
		if($_POST['update']){
			AssetManager::editAssets($_POST['assetid'],$_POST['asset'],$_POST['quantity']);
			$this->redirect(array('assets/index'));
		}
		
		$this->render('index', array('list'=>$list));
	}

	// public function actionDelete(id){
	// 	$query = AssetManager::model()->findByPk($id);
	// 	$query->delete();
	// 	$this->redirect('assets/index'	);
	// }

}