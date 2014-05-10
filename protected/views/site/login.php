<header>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div id="logo">
					<a href="#">
						<img src="<?php echo Yii::app()->request->baseUrl.'/images/logo.png'; ?>" height="40" alt="Emerge">
					</a>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- user login -->
<section id="userlogin_bg" class="visible">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-box">
					<h2 class="bigintro">Sign In</h2>
					<div class="divide-40"></div>
					<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'userlogin-form',
							'enableClientValidation'=>true,
							'clientOptions'=>array(
								'validateOnSubmit'=>true,
							),
							'htmlOptions'=>array(
								'role'=>'form'
							)
						)); ?>
							<div class="form-group">
								<label>Username/Phone Number</label>
								<i class="fa fa-user"></i>
								<?php echo $form->textField($modelUsers, 'primary_username', array('class'=>'form-control')); ?>
							</div>
							<div class="form-group">
								<label>Password</label>
								<i class="fa fa-lock"></i>
								<?php echo $form->passwordField($modelUsers, 'user_password', array('class'=>'form-control')) ?>
							</div>
							<div>
								<button type="submit" class="btn btn-danger" name="btnLoginUser">Login</button>
							</div>
					<?php $this->endWidget(); ?>
					<div class="divide-20"></div>
					<div class="login-helpers">
						<a href="#" onclick="swapScreen('agencylogin_bg');return false;" style="color:white; text-decoration:underline;">Agency login</a> <br>
						Don't have an account with us? <a href="#" onclick="swapScreen('register_bg');return false;" style="color:white; text-decoration:underline;">Register
							now!</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="agencylogin_bg">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-box">
					<h2 class="bigintro">Agency Sign In</h2>
					<div class="divide-40"></div>
					<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'agencylogin-form',
							'enableClientValidation'=>true,
							'clientOptions'=>array(
								'validateOnSubmit'=>true,
							),
							'htmlOptions'=>array(
								'role'=>'form'
							)
						)); ?>
							<div class="form-group">
								<label>Username</label>
								<i class="fa fa-user"></i>
								<?php echo $form->textField($modelAgencies,'agency_username', array('class'=>'form-control')); ?>
							</div>
							<div class="form-group">
								<label>Password</label>
								<i class="fa fa-lock"></i>
								<?php echo $form->passwordField($modelAgencies,'agency_password', array('class'=>'form-control')); ?>
							</div>
							<div>
								<button type="submit" class="btn btn-danger" name="btnLoginAgency">Login</button>
							</div>
					<?php $this->endWidget(); ?>
					<div class="divide-20"></div>
					<div class="login-helpers">
						<a href="#" onclick="swapScreen('userlogin_bg');return false;" style="color:white; text-decoration:underline;">User login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- user registration -->
<div id="register_bg">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-box">
					<h2 class="bigintro">Register</h2>
					<div class="divide-40"></div>
					<?php $form=$this->beginwidget('CActiveForm', array(
						'id'=>'userregistration-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true
						),
						'htmlOptions'=>array(
							'role'=>'form'
						)
					)); ?>
						<div class="form-group">
							<label>Username</label>
							<i class="fa fa-user"></i>
							<?php echo $form->textField($modelUsers, 'secondary_username', array('class'=>'form-control')); ?>
						</div>
						<div class="form-group">
							<label>Password</label>
							<i class="fa fa-lock"></i>
							<?php echo $form->passwordField($modelUsers, 'user_password', array('class'=>'form-control')); ?>
						</div>
						<div class="form-group">
							<label>Phone Number</label>
							<i class="fa fa-mobile-phone"></i>
							<?php echo $form->textField($modelUsers, 'primary_username', array('class'=>'form-control')); ?>
						</div>
						<div class="form-group">
							<label>First name</label>
							<i class="fa fa-user"></i>
							<?php echo $form->textField($modelUsers, 'user_firstname', array('class'=>'form-control')); ?>
						</div>
						<div class="form-group">
							<label>Middle name</label>
							<i class="fa fa-user"></i>
							<?php echo $form->textField($modelUsers, 'user_middlename', array('class'=>'form-control')); ?>
						</div>
						<div class="form-group">
							<label>Last name</label>
							<i class="fa fa-user"></i>
							<?php echo $form->textField($modelUsers, 'user_lastname', array('class'=>'form-control')); ?>
						</div>
						<div>
							<button type="submit" class="btn btn-danger" name="btnRegisterUser">Register</button>
						</div>
					<?php $this->endWidget(); ?>
					<div class="divide-20"></div>
					<div class="login-helpers">
						Already have an account? Login <a href="#" onclick="swapScreen('userlogin_bg');return false;" style="color:white; text-decoration:underline;">here</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function() {
		App.setPage("login_bg");
		App.init();
	});
</script>
<script>
	function swapScreen(id) {
		jQuery('.visible').removeClass('visible animated fadeInUp');
		jQuery('#'+id).addClass('visible animated fadeInUp');
	}
</script>