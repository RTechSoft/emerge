<?php

class Common {

	public static function pre($obj,$exit = false){
		echo "<pre>";
		print_r($obj);
		echo "</pre>";
		
		if($exit){
			exit();
		}
	}

	public static function showFile($fileName,$content,$mimeType=null,$terminate=true){
			if($mimeType===null)
			{
					if(($mimeType=CFileHelper::getMimeTypeByExtension($fileName))===null)
							$mimeType='text/plain';
			}
			header('Pragma: public');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-type: $mimeType");
			if(ob_get_length()===false)
					header('Content-Length: '.(function_exists('mb_strlen') ? mb_strlen($content,'8bit') : strlen($content)));
			header("Content-Disposition: inline; filename=\"$fileName\"");
			header('Content-Transfer-Encoding: binary');

			if($terminate)
			{
					// clean up the application first because the file downloading could take long time
					// which may cause timeout of some resources (such as DB connection)
					Yii::app()->end(0,false);
					echo $content;
					exit(0);
			}
			else
					echo $content;
	}

	public static function disableYiiLog(){
		foreach (Yii::app()->log->routes as $route){
			if ($route instanceof CWebLogRoute || $route instanceof CFileLogRoute || $route instanceof YiiDebugToolbarRoute)
			{
					$route->enabled = false;
			}
		} 
	}

	public static function getGender(){
		return array('1'=>Yii::t("labels","Male"),'2' => Yii::t("labels","Female"));
	}

	public static function notify($message, $status = NULL){
		Yii::app()->user->setFlash('msg', Yii::t('labels',$message));
		Yii::app()->user->setFlash('msgClass', 'alert alert-'.$status);
	}
}
?>