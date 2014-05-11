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
<?php if($agency->agency_location  == "" || $agency->agency_location2  == ""){ ?>
	<div class="alert alert-block alert-danger fade in">
		<b><i class="fa fa-warning"></i> Address not yet set. Please update profile to be able to access dashboard.</b>
	</div>
<?php } ?>
<div class="row">
	<div class="col-md-12">
		<div class="box border primary">
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
					   		<form role="form" name="agency_update_form" method="POST" action="<?php echo $this->createUrl('agency/update',array('id'=>Yii::app()->user->id)); ?>">
					   			<div class="row">
									<div class="col-md-6">
										<div class="box border primary">
											<div class="box-title">
												<h4><i class="fa fa-building-o"></i>Agency Information</h4>
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
												<label for="location_text">Location (Move pin or click on map to change location)</label>
												<input type="text" class="form-control" id="location_text" readonly placeholder="LOADING LOCATION...">
											  </div>
											  <h4>Login credentials</h4>
											  <div class="form-group">
												<label for="agency_username">Username</label>
												<input type="text" class="form-control" name="agency_username" id="agency_username" value="<?php echo $agency->agency_username; ?>">
											  </div>
											</div>

										</div>
									</div>
									<div class="col-md-6">
										<div class="box border primary">
											<div class="box-title">
												<h4><i class="fa fa-compass"></i>Map</h4>
											</div>
											<div class="box-body">
												<div id="map_canvas" class="gmaps" style="position:relative"></div>
											</div>
										</div>
									</div>
								</div>
							<div class="toolbox bottom">
								<button class="btn btn-lg btn-primary" type="submit"><i class="fa fa-cog"></i> Update</button>
							</div>
							</form>
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