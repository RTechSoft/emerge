<?php /* @var $this Controller */ ?>
<?php
if(Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'login') {
	$this->beginContent('//layouts/main_login');
} else {
	$this->beginContent('//layouts/main');
}
?>
	<?php echo $content; ?>
<?php $this->endContent(); ?>
