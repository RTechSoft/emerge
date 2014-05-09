EMERGE = {};
EMERGE.map = {
	markers:[],
	
	getAgencyLocation:function(address){
		var geocoder;
		var map;
		geocoder = new google.maps.Geocoder();

		var mapOptions = {
			zoom : 17,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		}

		map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

		geocoder.geocode( {'address':address}, function(results, status){
			if(status == google.maps.GeocoderStatus.OK){
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map : map,
					position : results[0].geometry.location,
					icon : 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/32/Map-Marker-Marker-Outside-Pink-icon.png',
				});

				marker.setAnimation(google.maps.Animation.DROP);
			}else{
				
				    handleNoGeolocation(false);
				
			}
		});

	},
	handleNoGeolocation:function(errorFlag){
	  if (errorFlag) {
	    var content = 'Error: The Geolocation service failed.';
	  } else {
	    var content = 'Error: Your browser doesn\'t support geolocation.';
	  }

	  var options = {
	    map: map,
	    position: new google.maps.LatLng(60, 105),
	    content: content
	  };

	  var infowindow = new google.maps.InfoWindow(options);
	  map.setCenter(options.position);
	},
};