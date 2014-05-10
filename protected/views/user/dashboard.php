<div class="row">
	<div class="col-sm-12">
		<div class="page-header">
			<div class="clearfix">
				<br/>
				<h3 class="content-title pull-left">User's Profile</h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box border primary">
			<div class="box-title">
				<h4><i class="fa fa-user"></i><?php echo $user->user_firstname." ".$user->user_lastname; ?></h4>
			</div>
			<div class="box-body">
				<div class="tabbable header-tabs user-profile">
					<ul class="nav nav-tabs">
					   <li class="active"><a href="#pro_overview" id="agencyTab2" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Personal</span></a></li>
					</ul>
					<div class="tab-content">
					   <div class="tab-pane fade in active" id="pro_overview">
						  <div class="row">
							<div class="col-md-4">
							  	<li class="list-group-item zero-padding">
									<center><img alt="" width=200 height=200 class="img-responsive" src="http://t2.tagstat.com/im/people/silhouette_m_300.png" style="margin:10px;"></center>
							  	</li> 
								<form name="form" method="POST" action="<?php echo $this->createUrl('user/dashboard'); ?>">			
								  	<div class="box border">
								  		<div class="box-body">
									  		<h4>Basic Information</h4>
											<div class="form-group">
												<label for="firstname">First Name</label>
												<input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user->user_firstname; ?>">
											</div>
											<div class="form-group">
												<label for="middlename">Middle Name</label>
												<input type="text" class="form-control" name="middlename" id="middlename" value="<?php echo $user->user_middlename; ?>">
											</div>
											<div class="form-group">
												<label for="lastname">Last Name</label>
												<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user->user_lastname; ?>">
											</div>	
											<h4>Login credentials</h4>
											<div class="form-group">
												<label for="primary_username">Primary Username</label>
												<input type="text" class="form-control" name="primary_username" id="primary_username" value="<?php echo $user->primary_username; ?>">
											</div>
											<div class="form-group">
												<label for="secondary_username">Secondary Username</label>
												<input type="text" class="form-control" name="secondary_username" id="secondary_username" value="<?php echo $user->secondary_username; ?>">
											</div>
											<div class="form-group">
												<label for="username">Password*</label>
												<input type="password" class="form-control" name="password" id="password" >
											</div>
											<input type="submit" value="Update" name="update" class="btn btn-primary">
										</div>
									</div>
								</form>									
							</div>
							<div class="col-md-8 pull-right">
					   			<div id="map_canvas" style="margin:auto;min-height:600px;"></div>
					   		</div>
					   </div>
				   </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
	markers = [];
	$lat = '<?php echo $agency->agency_location; ?>';
	$lng = '<?php echo $agency->agency_location2; ?>';
	$(document).ready(function(){
		getAgencyLocationForProfile($lat,$lng);
		$('.agencyTab1').click(function(){
			getAgencyLocationForProfile($lat,$lng);
		});
	});
	$(window).resize(function(){
		getAgencyLocationForProfile($lat,$lng);
	});
</script> -->