<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<title>Contacter AKISTEEL</title>
		<?php include('inc/meta.php'); ?>
	</head>
	<body class="contact">
		
		<?php include('inc/header.php'); ?>
		
		<div class="row fullwidth content">
			<div class="large-6 medium-6 small-12 columns">
				<div class="contenu">
					<div class="coordonnees">
						<h1>Contacter AKISTEEL</h1>
						<p>
							AKISTEEL<br/>
							52 rue Camille Pelletan<br/>
							33150 Cenon
						</p>
						<p>
							Tél. <a href="tel:+33557614541">05 57 61 45 41</a>
						</p>
					</div>
					<h2>Formulaire de contact</h2>
					<form class="row" method="post">
						<div class="large-6 medium-12 columns">
							<input type="text" name="prenom" placeholder="Votre prénom" />						
						</div>
						<div class="large-6 medium-12 columns">
							<input type="text" name="nom" placeholder="Votre nom" />
						</div>
						<div class="large-12 columns">
							<input type="text" name="adresse" placeholder="Votre adresse">
						</div>
						<div class="large-4 medium-5 small-12 columns">
							<input type="text" name="codepostal" placeholder="Code postal" />						
						</div>
						<div class="large-8 medium-7 small-12 columns">
							<input type="text" name="ville" placeholder="Ville" />
						</div>
						<div class="large-6 medium-12 columns">
							<input type="tel" name="telephone" placeholder="Votre n° de téléphone" />						
						</div>
						<div class="large-6 medium-12 columns">
							<input type="email" name="email" placeholder="Votre e-mail" />
						</div>
						<div class="large-12 columns">
							<textarea name="message" placeholder="Votre message"></textarea>
						</div>
						<div class="large-12 columns">
							<input type="submit" value="Envoyer" />
						</div>
						<div class="large-12 columns">
							<p class="info">
								Conformément à la loi Informatique et Libertés en date du 6 janvier 1978, vous disposez d'un droit d'accès, de rectification, de modification et de suppression des données qui vous concernent. Vous pouvez exercer ce droit en nous envoyant un courrier électronique ou postal.
							</p>
						</div>
					</form>
				</div>
			</div>
			<div class="large-6 medium-6 small-12 columns photos">
				<div id="map-canvas"></div>
			</div>
		</div>
		
		<?php include('inc/footer.php'); ?>
		
		<?php include('inc/scripts.php'); ?>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		<script>
			var map;
			function initialize() {
			
				var mapOptions = {
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					mapTypeControl: false,
					zoom: 12,
					zoomControl: false,
					panControl: false,
					streetViewControl: false,
					scaleControl: false,
					overviewMapControl: false,
					center: new google.maps.LatLng(44.858289, -0.5192039999999452)
				};
				
				map = new google.maps.Map(document.getElementById('map-canvas'),
					mapOptions);
				
				var mapStyles = [
					{
						"featureType": "landscape",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "water",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "water",
						"elementType": "labels",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "administrative",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "administrative",
						"elementType": "labels",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "poi",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "road",
						"stylers": [
							{ "visibility": "on" }
						]
					},{
						"featureType": "transit",
						"stylers": [
							{ "visibility": "on" }
						]
					}
				];
				
				map.setOptions({styles: mapStyles});
				
				var icon = {
					path: 'M16.5,51s-16.5-25.119-16.5-34.327c0-9.2082,7.3873-16.673,16.5-16.673,9.113,0,16.5,7.4648,16.5,16.673,0,9.208-16.5,34.327-16.5,34.327zm0-27.462c3.7523,0,6.7941-3.0737,6.7941-6.8654,0-3.7916-3.0418-6.8654-6.7941-6.8654s-6.7941,3.0737-6.7941,6.8654c0,3.7916,3.0418,6.8654,6.7941,6.8654z',
					anchor: new google.maps.Point(16.5, 51),
					fillColor: '#17356d',
					fillOpacity: 1,
					strokeWeight: 0,
					scale: 0.66
				};
				
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(44.858289, -0.5192039999999452),
					map: map,
					icon: icon,
					title: 'AKISTEEL'
				});
			}
			
			google.maps.event.addDomListener(window, 'load', initialize);
			
			function checkResize(){
			
				var center = map.getCenter();
				google.maps.event.trigger(map, 'resize');
				map.setCenter(center);
			}
			
			window.onresize = checkResize;
			
			$(document).ready(function(){
				$('nav ul li:nth-child(4)').addClass('active');
			});
			
		</script>
	</body>
</html>
