<div id="map_canvas" style="min-height:900px;">
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
	$(document).ready(function(){
		EMERGE.map.getAgencyLocation('<?php echo $agency->agency_name." ".$agency->agency_location; ?>');
	});
</script>