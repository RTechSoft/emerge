<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Emerge | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/cloud-admin.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/font-awesome/css/font-awesome.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/js/uniform/css/uniform.default.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/animatecss/animate.min.css');
	?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body class="login">
	<section id="page">
		<?php echo $content; ?>
	</section>
	<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery/jquery-2.0.3.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/bootstrap-dist/js/bootstrap.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/uniform/jquery.uniform.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/backstretch/jquery.backstretch.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/script.js');
	?>
</body>
</html>