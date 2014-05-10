<div id="map_canvas" style="min-height:900px;">
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
	$(document).ready(function(){
		markers = [];
		map.getAgencyLocation(<?php echo $agency->agency_location; ?>,<?php echo $agency->agency_location2; ?>);
	});
</script>