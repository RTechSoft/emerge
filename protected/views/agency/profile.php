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
<!-- /PAGE HEADER -->
<!-- USER PROFILE -->
<div class="row">
	<div class="col-md-12">
		<!-- BOX -->
		<div class="box border">
			<div class="box-title">
				<h4><i class="fa fa-user"></i></h4>
			</div>
			<div class="box-body">
				<div class="tabbable header-tabs user-profile">
					<ul class="nav nav-tabs">
					   <li><a href="#pro_edit" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile"> Edit Account</span></a></li>
					   <li class="active"><a href="#pro_overview" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Overview</span></a></li>
					</ul>
					<div class="tab-content">
					   <!-- OVERVIEW -->
					   <div class="tab-pane fade in active" id="pro_overview">
						  <div class="row">
							<!-- PROFILE PIC -->
							<div class="col-md-3">
								<div class="list-group">
								  <li class="list-group-item zero-padding">
									<center><img alt="" class="img-responsive" src="http://t2.tagstat.com/im/people/silhouette_m_300.png" style="margin:3px;"></center>
								  </li>
								  <div class="list-group-item profile-details">
										<h2><?php echo $agency->agency_name; ?></h2>
										<span class="span">
								 </div>
								  <a href="#" class="list-group-item"><?php echo AgencyTypes::getAgencyType($agency->agency_type); ?></a>
								  <a href="#" class="list-group-item"><?php echo ($agency->location_scope == "")?"Location Range Not Yet Registered":$agency->location_scope; ?></a>
								</div>														
							</div>
							<!-- /PROFILE PIC -->
							<!-- PROFILE DETAILS -->
							<div id="map_canvas" style="margin:auto;min-height:600px;" class="col-md-7"></div>
							<!-- /PROFILE DETAILS -->
						  </div>
					   </div>
					   <!-- /OVERVIEW -->
					   
					   <!-- EDIT ACCOUNT -->
					   <div class="tab-pane fade" id="pro_edit">

					   </div>
					   <!-- /HELP -->
					</div>
				</div>
				<!-- /USER PROFILE -->
			</div>
		</div>
	</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
	markers = [];
	$(document).ready(function(){
		getAgencyLocationForProfile(<?php echo $agency->agency_location; ?>,<?php echo $agency->agency_location2; ?>);
	});
	$(window).resize(function(){
		getAgencyLocationForProfile(<?php echo $agency->agency_location; ?>,<?php echo $agency->agency_location2; ?>);
	});
</script>