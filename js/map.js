function getAgencyLocationForProfile(address1,address2){
	var mapOptions = {
      zoom: 17
    };

    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

    if(address1 == "" || address2 == ""){
    	navigator.geolocation.getCurrentPosition(function(position) {
		    var pos = new google.maps.LatLng(position.coords.latitude,
		                                     position.coords.longitude);

		      map.setCenter(pos);
		      var marker = new google.maps.Marker({
		        position: pos,
		        map: map,
		        draggable:true
		      });
		      console.log("current:"+pos);
		      markers.push(marker);
		      google.maps.event.addListener(marker, 'mouseup', function(e) {
		        placeMarker2(e.latLng, map);
		      });

		}, function() {
		    alert('something went wrong');
		});
    }else{
    	pos = new google.maps.LatLng(address1,address2);
    	map.setCenter(pos);
		var marker = new google.maps.Marker({
			position: pos,
			map: map,
			draggable:true
		});
		console.log("current:"+pos);
		markers.push(marker);
		google.maps.event.addListener(marker, 'mouseup', function(e) {
			placeMarker2(e.latLng, map);
		});
    }
    google.maps.event.addListener(map, 'click', function(e) {
	    placeMarker2(e.latLng, map);
	  });
}

function getAgencyLocation(address1,address2){
	var mapOptions = {
      zoom: 17
    };

    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

    if(address1 == "" || address2 == ""){
    	navigator.geolocation.getCurrentPosition(function(position) {
		    var pos = new google.maps.LatLng(position.coords.latitude,
		                                     position.coords.longitude);

		      map.setCenter(pos);
		      var marker = new google.maps.Marker({
		        position: pos,
		        map: map,
		        draggable:true
		      });
		      console.log("current:"+pos);
		      markers.push(marker);
		      google.maps.event.addListener(marker, 'mouseup', function(e) {
		        placeMarker(e.latLng, map);
		      });

		}, function() {
		    alert('something went wrong');
		});
    }else{
    	pos = new google.maps.LatLng(address1,address2);
    	map.setCenter(pos);
		var marker = new google.maps.Marker({
			position: pos,
			map: map,
			draggable:true
		});
		console.log("current:"+pos);
		markers.push(marker);
		google.maps.event.addListener(marker, 'mouseup', function(e) {
		placeMarker(e.latLng, map);
		});
    }
    
    google.maps.event.addListener(map, 'click', function(e) {
	    placeMarker(e.latLng, map);
	  });
}
function placeMarker(position, map){
	deleteMarkers();
	map.panTo(position);
	var marker = new google.maps.Marker({
		position: position,
		map: map,
		draggable:true
	});

	console.log("current:"+position);
	markers.push(marker);
	google.maps.event.addListener(marker, 'mouseup', function(e) {
	    placeMarker(e.latLng, map);
	  });
}
function placeMarker2(position, map){
	deleteMarkers();
	map.panTo(position);
	var marker = new google.maps.Marker({
		position: position,
		map: map,
		draggable:true
	});

	console.log("current:"+position);
	markers.push(marker);
	google.maps.event.addListener(marker, 'mouseup', function(e) {
	    placeMarker(e.latLng, map);
	  });
}
function setAllMap(map){
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
	}
}

function deleteMarkers(){
	clearMarkers();
	markers = [];
}

function clearMarkers(){
	setAllMap(null);
}
	
