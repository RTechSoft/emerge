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
	<div id="map_canvas" style="margin-left:5px;margin-top:-10px;min-height:800px;" class="col-md-9"></div>
	<div id="directions-panel" style="width:400px;" class="col-md-3"></div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
	markers = [];
	$lat = '<?php echo $agency->agency_location; ?>';
	$lng = '<?php echo $agency->agency_location2; ?>';
	$(document).ready(function(){
		getAgencyLocation($lat,$lng);
	});
	$(window).resize(function(){
		getAgencyLocation($lat,$lng);
	});
</script>