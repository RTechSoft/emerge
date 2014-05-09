<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Emerge</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/cloud-admin.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/themes/default.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/responsive.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/font-awesome/css/font-awesome.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/animatecss/animate.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/js/jquery-todo/css/styles.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/js/gritter/css/jquery.gritter.css');
	?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery/jquery-2.0.3.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/bootstrap-dist/js/bootstrap.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jQuery-BlockUI/jquery.blockUI.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/sparklines/jquery.sparkline.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery-easing/jquery.easing.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/easypiechart/jquery.easypiechart.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/flot/jquery.flot.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/flot/jquery.flot.time.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/flot/jquery.flot.selection.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/flot/jquery.flot.resize.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/flot/jquery.flot.pie.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/flot/jquery.flot.stack.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/flot/jquery.flot.crosshair.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery-todo/js/paddystodolist.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/timeago/jquery.timeago.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/fullcalendar/fullcalendar.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jQuery-Cookie/jquery.cookie.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/gritter/js/jquery.gritter.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/script.js');
	?>
	<script>
		jQuery(document).ready(function() {
			App.setPage("index");
			App.init();
		})
	</script>
</body>
</html>