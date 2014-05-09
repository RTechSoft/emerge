<div id="map_canvas" style="height:500px;">
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&key=AIzaSyCGBBggqsTiEzQfZ3TZD4pFTiB9bfhmcI0"></script>
<script>
	EMERGE.map.getAgencyLocation('<?php echo $agency->agency_name; ?>');
</script>