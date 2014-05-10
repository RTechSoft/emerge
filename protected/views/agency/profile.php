<div class="row">
	<div class="col-sm-12">
		<div class="page-header">
			<div class="clearfix">
				<br/>
				<h3 class="content-title pull-left">Agency Profile</h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box border">
			<div class="box-title">
				<h4><i class="fa fa-user"></i></h4>
			</div>
			<div class="box-body">
				<div class="tabbable header-tabs user-profile">
					<ul class="nav nav-tabs">
					   <li class="active"><a href="#pro_overview" id="agencyTab2" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Overview</span></a></li>
					</ul>
					<div class="tab-content">
					   <div class="tab-pane fade in active" id="pro_overview">
					   <div class="row">
					   			<form role="form" name="agency_update_form" method="POST" action="<?php echo $this->createUrl('agency/update',array('id'=>Yii::app()->user->id)); ?>">
									<div class="col-md-4">
										<div class="box border">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Agency Information</h4>
											</div>
											<div class="box-body big">
											  <h4>Basic Information</h4>
											  <div class="form-group">
												<label for="agency_name">Organization Name</label>
												<input type="text" class="form-control" name="agency_name" id="agency_name" value="<?php echo $agency->agency_name; ?>">
											  </div>
											  <div class="form-group">
												<label for="agency_type">Type</label>
												<select class="form-control" id="agency_type" name="agency_type">
													  <option value=0>Select Type of Organization</option>
													  <?php foreach($types as $type){ ?>
													  	<option value=<?php echo $type->id; ?>><?php echo $type->type; ?></option>
													  <?php } ?>
												</select>
											  </div>
											  <input type="hidden" readonly id="location1" name="location1" value="<?php $agency->agency_location; ?>">
											  <input type="hidden" readonly id="location2" name="location2" value="<?php $agency->agency_location2; ?>">
											  <div class="form-group">
												<label for="location_text">Location</label>
												<input type="text" class="form-control" id="location_text" readonly>
											  </div>
											  <h4>Login credentials</h4>
											  <div class="form-group">
												<label for="agency_username">Username</label>
												<input type="text" class="form-control" name="agency_username" id="agency_username" value="<?php echo $agency->agency_username; ?>">
											  </div>
											  <div class="form-group">
												<label for="agency_username">Password</label>
												<input type="password" class="form-control" name="agency_password" id="agency_password" placeholder="Leave blank if will not be edited">
											  </div>
											  <input type="submit" value="Update">
											</div>
										</div>
									</div>
									<div id="map_canvas" style="margin:auto;min-height:600px;" class="col-md-7"></div>
								</form>
							</div>
					   </div>
					   <div class="tab-pane fade" id="pro_edit">
					   		
					   </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
	markers = [];
	$lat = '<?php echo $agency->agency_location; ?>';
	$lng = '<?php echo $agency->agency_location2; ?>';
	$(document).ready(function(){
		getAgencyLocationForProfile($lat,$lng);
	});
	$(window).resize(function(){
		getAgencyLocationForProfile($lat,$lng);
	});
</script>