<div class="row">
	<div id="map_canvas" style="min-height:900px;" class="col-md-9"></div>
	<div id="directions-panel" style="width:400px;" class="col-md-3"></div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
	markers = [];
	$(document).ready(function(){
		getAgencyLocation(<?php echo $agency->agency_location; ?>,<?php echo $agency->agency_location2; ?>);
	});
	$(window).resize(function(){
		getAgencyLocation(<?php echo $agency->agency_location; ?>,<?php echo $agency->agency_location2; ?>);
	});
</script>