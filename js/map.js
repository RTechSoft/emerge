//mapping

function getAgencyLocationForProfile(address1,address2){
	var mapOptions = {
      zoom: 18
    };

    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

    if(address1 == "" || address2 == ""){
    	navigator.geolocation.getCurrentPosition(function(position) {
		    var pos = new google.maps.LatLng(position.coords.latitude,
		                                     position.coords.longitude);
		      $('#location1').val(position.coords.latitude);
			  $('#location2').val(position.coords.longitude);
			  getAddressThroughGeolocation(position.coords.latitude,position.coords.longitude);
		      map.setCenter(pos);
		      var marker = new google.maps.Marker({
		        position: pos,
		        map: map,
		        draggable:true
		      });

		      markers.push(marker);
		      google.maps.event.addListener(marker, 'mouseup', function(e) {
		        placeMarker2(e.latLng, map);
		      });

		}, function() {
		    alert('something went wrong');
		});
    }else{
    	pos = new google.maps.LatLng(address1,address2);
    	$('#location1').val(address1);
		$('#location2').val(address2);
		getAddressThroughGeolocation(address1,address2);
    	map.setCenter(pos);
		var marker = new google.maps.Marker({
			position: pos,
			map: map,
			draggable:true
		});

		markers.push(marker);
		google.maps.event.addListener(marker, 'mouseup', function(e) {
			placeMarker2(e.latLng, map);
		});
    }
    google.maps.event.addListener(map, 'click', function(e) {
	    placeMarker2(e.latLng, map);
	  });
}

//modifiers
function placeMarker(position, map){
	deleteMarkers();
	map.panTo(position);
	var marker = new google.maps.Marker({
		position: position,
		map: map,
		draggable:true
	});

	markers.push(marker);
	google.maps.event.addListener(marker, 'mouseup', function(e) {
	    placeMarker(e.latLng, map);
	  });
}
function placeMarker2(position, map,lat,lng){
	deleteMarkers();
	map.panTo(position);
	var marker = new google.maps.Marker({
		position: position,
		map: map,
		draggable:true
	});
	position = position.toString();
	var coords = position.substr(1,position.length-2);
	$locArr = coords.split(', ');
	$('#location1').val($locArr[0]);
	$('#location2').val($locArr[1]);
	getAddressThroughGeolocation($locArr[0],$locArr[1]);
	markers.push(marker);
	google.maps.event.addListener(marker, 'mouseup', function(e) {
	    placeMarker2(e.latLng, map,lat,lng);
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

function getAddressThroughGeolocation(lat,lng){
	var geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(lat,lng);
	geocoder.geocode({'latLng': latlng}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
				$('#location_text').val(results[0].formatted_address);
		} else {
			alert('Something went wrong. Check your internet connection.');
		}
	});
}


//mapping
function getAgencyLocation(address1,address2){
	directionsDisplay = new google.maps.DirectionsRenderer();
	pos = new google.maps.LatLng(address1,address2);
	var mapOptions = {
      zoom : 18,
      center : pos
    };

    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

    directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById('directions-panel'));
}


function getRoute(latLng){
	
	$(".requests-panel").on("click", ".request", function() {
		$classList = $(this).attr('class').split(" ");
		$number = $classList[2];
		$id = $(this).attr("data-id");
		$address = $(this).attr("data-option");
		
		var request = {
		    origin: latLng,
		    destination: $address,
		    provideRouteAlternatives: true,
		    travelMode: google.maps.TravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) {
		    if (status == google.maps.DirectionsStatus.OK) {
		      directionsDisplay.setDirections(response);
		    }
		});
		
	});
}
	
