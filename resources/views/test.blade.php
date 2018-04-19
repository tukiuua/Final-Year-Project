<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    
</head>
<body>

<br />
				<h2>Directions</h2>
				<div id="map-canvas"></div>
				<div id="directions-panel"></div>


				<style type="text/css">
					/*Style the map*/
					#map-canvas{
						border-radius: 10px;
						height: 500px;
						display:  block;
					}
					/*Style the text directions*/
					#directions-panel{
						height: auto;
						display:  block;
					}
				</style>

                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeFpgY20dPEl7IzOmPPQ4Tl8U5jExp45M"></script>
				<script>
				function initMap() {
					var pointA = new google.maps.LatLng(52.4869642, -1.8902314),
							pointB = new google.maps.LatLng((52.4869642, -1.8902314),
							myOptions = {
										zoom: 16,
										center: pointB
									},

							map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),

							// Instantiate a directions service.
							directionsService = new google.maps.DirectionsService,
							directionsDisplay = new google.maps.DirectionsRenderer({map: map}),

							directionsDisplay = new google.maps.DirectionsRenderer();
							directionsDisplay.setMap(map);
							directionsDisplay.setPanel(document.getElementById('directions-panel'));

							calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
				}

				function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
					directionsService.route({
						origin: pointB,
						destination: pointA,
						avoidTolls: true,
						avoidHighways: false,
						travelMode: google.maps.TravelMode.DRIVING
						}, function (response, status) {
								if (status == google.maps.DirectionsStatus.OK) {
										directionsDisplay.setDirections(response);
								} else {
										window.alert('Directions request failed due to ' + status);
								}
						});
				}

				initMap();
				</script>

    
</body>
</html>