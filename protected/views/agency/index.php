<div class="row">
	<div class="col-sm-12">
		<div class="page-header">
			<div class="clearfix">
				<br/>
				<h3 class="content-title pull-left">Help Requests</h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="box border primary">
			<div class="box-title">
				<h4><i class="fa fa-compass"></i>Map</h4>
			</div>
			<div class="box-body">
				<div id="map_canvas" class="gmaps"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box border primary" style="height:610px">
			<div class="box-title">
				<h4><i class="fa fa-compass"></i>Route Info</h4>
			</div>
			<div class="box-body" id="directions-panel">
				
			</div>
		</div>
	</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
	markers = [];
	var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	$lat = '<?php echo $agency->agency_location; ?>';
	$lng = '<?php echo $agency->agency_location2; ?>';
	$(document).ready(function(){
		getAgencyLocation($lat,$lng);
		getRoute($lat,$lng);
	});
	$(window).resize(function(){
		getAgencyLocation($lat,$lng);
	});
</script>