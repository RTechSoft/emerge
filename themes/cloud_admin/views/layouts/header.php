<header class="navbar clearfix" id="header">
	<div class="container">
		<div class="navbar-brand">
			<!-- logo -->
			<a href="#">
				<img src="<?php echo Yii::app()->request->baseUrl.'/images/logo.png'; ?>" class="img-responsive" height="30" width="120">
			</a
			<!-- sidebar collapse -->
			<div id="sidebar-collapse" class="sidebar-collapse btn visible-xs">
				<i class="fa fa-users" 
					data-icon1="fa fa-users" 
					data-icon2="fa fa-users" ></i>
			</div>
		</div>
	
		<!-- navbar left -->
		<ul class="nav navbar-nav pull-left">
			<?php if(Yii::app()->user->userType == 1) { ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle tip-bottom" title="Test">
						<span class="name">Test</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="name">Assets</span>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Manage</a></li>
					</ul>
				</li>
			<?php } else if(Yii::app()->user->userType == 2) { ?>
				<li class="dropdown">
					<a href="<?php echo Yii::app()->createUrl('agency/dashboard'); ?>" class="dropdown-toggle tip-bottom" title="Dashboard">
						<span class="name">Dashboard</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle tip-bottom" title="Assets">
						<span class="name">Assets</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle tip-bottom" title="Help Logs">
						<span class="name">Help Logs</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="team-status-toggle dropdown-toggle tip-bottom" data-toggle="tooltip" title="Toggle Tracker">
						<span class="name">Track</span>
						<i class="fa fa-angle-down"></i>
					</a>
				</li>
			<?php } ?>
		</ul>

		<!-- top nav -->
		<ul class="nav navbar-nav pull-right">
			<li class="dropdown user pull-right" id="header-user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo Yii::app()->theme->baseUrl.'/library/img/avatars/avatar3.jpg'; ?>" >
					<span class="username"><?php echo Yii::app()->user->name; ?></span>
					<i class="fa fa-angle-down"></i>
				</a>

				<ul class="dropdown-menu">
					<?php if(Yii::app()->user->userType == 1){ ?>
						<li><a href="#">Profile Settings</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('site/logout'); ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
					<?php } else if(Yii::app()->user->userType == 2){ ?>
						<li><a href="<?php echo Yii::app()->createUrl('agency/profile'); ?>">Profile Settings</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('site/logout'); ?>">Logout</a></li>
					<?php } ?>
				</ul>
			</li>
		</ul>
	</div>

	<!-- team status -->
	<div class="container team-status" id="team-status">
		<div id="scrollbar">
			<div class="handle"></div>
		</div>
		<div id="teamslider">
			<ul class="team-list">
				<li class="current">
					<a href="javascript:void(0);">
						<span class="image">
							<img src="<?php echo Yii::app()->theme->baseUrl.'/library/img/avatars/avatar3.jpg'; ?>" alt="">
						</span>
						<span class="title">You</span>
						<div class="progress">
							<div class="progress-bar progress-bar-success" style="width:35%">
								<span class="sr-only">35% Complete (success)</span>
							</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
</header>