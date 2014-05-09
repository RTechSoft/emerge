<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Emerge</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- stylesheets -->
	<?php
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/cloud-admin-frontend.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/font-awesome/css/font-awesome.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/animatecss/animate.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/carousel.css');
	?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- header -->
	<?php $this->renderPartial('//layouts/header'); ?>

	<!-- main content -->
	<div id="page">
		<?php echo $content; ?>
	</div>

	<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery-1.9.1.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/bootstrap-dist/js/bootstrap.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/waypoint/waypoints.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/navmaster/jquery.scrollTo.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/navmaster/jquery.nav.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/isotope/jquery.isotope.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/colorbox/jquery.colorbox.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/script.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/map.js');
	?>
</body>
</html>	