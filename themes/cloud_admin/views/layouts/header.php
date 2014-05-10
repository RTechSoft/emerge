<header class="navbar clearfix" id="header">
	<div class="container">
		<div class="navbar-brand">
			<!-- logo -->
			<a href="#">
				<img src="<?php echo Yii::app()->theme->baseUrl.'/library/img/logo/logo.png'; ?>" class="img-responsive" height="30" width="120">
			</a>
			<!-- team status for mobile -->
			<div class="visible-xs">
				<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
					<i class="fa fa-users"></i>
				</a>
			</div>
			<!-- sidebar collapse -->
			<div id="sidebar-collapse" class="sidebar-collapse btn">
				<i class="fa fa-bars" 
					data-icon1="fa fa-bars" 
					data-icon2="fa fa-bars" ></i>
			</div>
		</div>
	
		<!-- navbar left -->
		<ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">
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
					<a href="#" class="dropdown-toggle tip-bottom" title="Test">
						<span class="name">Dashboard</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle tip-bottom" title="Test">
						<span class="name">Assets</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle tip-bottom" title="Test">
						<span class="name">Help Logs</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="team-status-toggle dropdown-toggle tip-bottom" data-toggle="tooltip" title="Toggle Team View">
						<i class="fa fa-users"></i>
						<span class="name">Team Status</span>
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
						<li><a href="#">Profile Settings</a></li>
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