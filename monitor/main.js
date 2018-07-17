(function() {
	
	window.onload = function() {
	
		// Creating a new map
		var map = new google.maps.Map(document.getElementById("map"), {
          center: new google.maps.LatLng(0.3476,32.5825),
          zoom: 6,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
		// Creating a global infoWindow object that will be reused by all markers
		
		var infoWindow = new google.maps.InfoWindow();

		// Looping through the JSON data
		for (var i = 0, length = json.length; i < length; i++) {
			var data = json[i],
				latLng = new google.maps.LatLng(data.lat, data.lng);

			// Creating a marker and putting it on the map
			var marker = new google.maps.Marker({
				position: latLng,
				map: map,
				tx_id: data.tx_id
			});

			// Creating a closure to retain the correct data, notice how I pass the current data in the loop into the closure (marker, data)
			(function(marker, data) {

				// Attaching a click event to the current marker
				google.maps.event.addListener(marker, "click", function(e) {
					// infoWindow.setContent(data.service_area);
					infoWindow.setContent(data.tx_id);
					infoWindow.open(map, marker);
				});


			})(marker, data);

		}
	}

})();