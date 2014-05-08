<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userregistration-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($modelUser,'primary_username'); ?>
		<?php echo $form->textField($modelUser,'primary_username'); ?>
		<?php echo $form->error($modelUser,'primary_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelUser,'secondary_username'); ?>
		<?php echo $form->textField($modelUser,'secondary_username'); ?>
		<?php echo $form->error($modelUser,'secondary_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelUser,'user_firstname'); ?>
		<?php echo $form->textField($modelUser,'user_firstname'); ?>
		<?php echo $form->error($modelUser,'user_firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelUser,'user_middlename'); ?>
		<?php echo $form->textField($modelUser,'user_middlename'); ?>
		<?php echo $form->error($modelUser,'user_middlename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelUser,'user_lastname'); ?>
		<?php echo $form->textField($modelUser,'user_lastname'); ?>
		<?php echo $form->error($modelUser,'user_lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelUser,'user_password'); ?>
		<?php echo $form->passwordField($modelUser,'user_password'); ?>
		<?php echo $form->error($modelUser,'user_password'); ?>
	</div>

	<div class="row buttons">
		<input type="submit" value="Register" name="btnRegisterUser">
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userregistration-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($modelAgency,'agency_username'); ?>
		<?php echo $form->textField($modelAgency,'agency_username'); ?>
		<?php echo $form->error($modelAgency,'agency_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAgency,'agency_password'); ?>
		<?php echo $form->passwordField($modelAgency,'agency_password'); ?>
		<?php echo $form->error($modelAgency,'agency_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAgency,'agency_name'); ?>
		<?php echo $form->textField($modelAgency,'agency_name'); ?>
		<?php echo $form->error($modelAgency,'agency_name'); ?>
	</div>

	<div class="row buttons">
		<input type="submit" value="Register" name="btnRegisterAgency">
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->