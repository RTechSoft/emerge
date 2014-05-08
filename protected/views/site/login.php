<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userlogin-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($modelUsers,'primary_username'); ?>
		<?php echo $form->textField($modelUsers,'primary_username'); ?>
		<?php echo $form->error($modelUsers,'primary_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelUsers,'user_password'); ?>
		<?php echo $form->passwordField($modelUsers,'user_password'); ?>
		<?php echo $form->error($modelUsers,'user_password'); ?>
	</div>

	<div class="row buttons">
		<input type="submit" value="Login" name="btnLoginUser">
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

<br>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'agencylogin-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	)
)); ?>

	<div class="row">
		<?php echo $form->labelEx($modelAgencies,'agency_username'); ?>
		<?php echo $form->textField($modelAgencies,'agency_username'); ?>
		<?php echo $form->error($modelAgencies,'agency_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAgencies,'agency_password'); ?>
		<?php echo $form->passwordField($modelAgencies,'agency_password'); ?>
		<?php echo $form->error($modelAgencies,'agency_password'); ?>
	</div>

	<div class="row buttons">
		<input type="submit" value="Login" name="btnLoginAgency">
	</div>

<?php $this->endWidget(); ?>
</div>