


				
					directionsDisplay = new google.maps.DirectionsRenderer();



					var chicago = new google.maps.LatLng(21.1289956, 82.7792201);
					var mapOptions = {
						zoom :10,
						center : chicago
					}
					map = new google.maps.Map(document.getElementById('gmap'), mapOptions);
					var items = [
					        ['title 1 to display on hover', "12.9680475", "77.739097", 'infowindow 1 content'],
					        ['title 2 to display on hover', "13.0349961","77.5981732", 'infowindow 2 content'],
					        ['title 3 to display on hover', "12.9347159", "77.5528681", 'infowindow 3 content']
					    ];
					//Set all your markers, the magic happens in another function - setMarkers(map, markers) which gets called
				        setMarkers(map, items);
				        infowindow = new google.maps.InfoWindow({
				        content: "holding..."
				        });
				        

					     //function to actually put the markers on the map
						    function setMarkers(map, markers) 
						    {
						        //loop through and place markers
						        for (var i = 0; i < markers.length; i++) 
						        {
						            var sites = markers[i];
						            var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
						            var marker = new google.maps.Marker({
						                position: siteLatLng,
						                map: map,
						                title: sites[0],
						                html: sites[3]
						            });

						            //initial content string
						            var contentString = "Some content";

						            //attach infowindow on click
						            google.maps.event.addListener(marker, "click", function () 
						            {
						                infowindow.setContent(this.html);
						                infowindow.open(map, this);
						            });
						        }
						    }




					var fromInput = /** @type {HTMLInputElement} */(
						document.getElementById('start-input'));
					var toInput = /** @type {HTMLInputElement} */(
						document.getElementById('end-input'));
					var stopOver = /** @type {HTMLInputElement} */(
						document.getElementById('taginputbox'));

					//map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

					var autocomplete = new google.maps.places.Autocomplete(fromInput);
					var autocomplete2 = new google.maps.places.Autocomplete(toInput);
					var autocomplete3 = new google.maps.places.Autocomplete(stopOver);
					autocomplete.bindTo('bounds', map);

					directionsDisplay.setMap(map);
					//directionsDisplay.setPanel(document.getElementById('directionsPanel'));


					


					// Try HTML5 geolocation
					if (navigator.geolocation) {
						navigator.geolocation.getCurrentPosition(function(position) {


							var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

							var infowindow = new google.maps.InfoWindow({
								map : map,
								position : pos,
								content : 'Your are current location'
							});

							map.setCenter(pos);
						}, function() {
							handleNoGeolocation(true);
						});
					} else {
						// Browser doesn't support Geolocation
						handleNoGeolocation(false);
					}
				
 



 