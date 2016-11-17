<? 
	require( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/inc.config.php" );
	require 'admin/classes/Contact.php';
	require 'admin/classes/utils.php';
	session_start();
	
	$contact = 				new Contact();
	
	$debug = 				true;
	$mon_action = 			$_POST[ "mon_action" ];
	$anti_spam = 			$_POST[ "as" ];
	//print_pre( $_POST );
	
	$affichage_success = 	"wait";
	$affichage_erreur = 	"wait";
	
	// ---- Post du formulaire ------------------------------- //
	if ( $mon_action == "poster" && $anti_spam == '' ) {
		if ( $debug ) echo "On poste...<br>";
		
		// ---- Enregistrement dans "contact" -------- //
		if ( 1 == 1 ) {
			$num_contact = $contact->isContact( $_POST[ "email" ], $debug );
			
			unset( $val );
			$val[ "id"] = 			$num_contact;
			$val[ "firstname"] = 	$_POST[ "prenom" ];
			$val[ "name"] = 		$_POST[ "nom" ];
			$val[ "adresse"] = 		$_POST[ "adresse" ];
			$val[ "cp"] = 			$_POST[ "cp" ];
			$val[ "ville"] = 		$_POST[ "ville" ];
			$val[ "email"] = 		$_POST[ "email" ];
			$val[ "tel"] = 			$_POST[ "tel" ];
			$val[ "message"] = 		$_POST[ "message" ];
			$val[ "newsletter"] = 	$_POST[ "newsletter" ];
			$val[ "fromcontact"] =	"on";
			if ( $num_contact <= 0 ) $contact->contactAdd( $val, $debug );
			else $contact->contactModify( $val, $debug );
		}
		// ------------------------------------------- //
		
		// ---- Envoi du mail à l'admin -------------- //
		if ( 1 == 1 ) {
			$entete = "From:" . $_POST[ "nom" ] . " <" .  $_POST[ "email" ] . ">\n";
			$entete .= "MIME-version: 1.0\n";
			$entete .= "Content-type: text/html; charset= iso-8859-1\n";
			$entete .= "Bcc:" . MAIL_BCC . "\n";
			//echo "Entete :<br>" . $entete . "<br><br>";
			
			$sujet = utf8_decode( "Prise de contact" );
			
			//$_to = "franck_langleron@hotmail.com";
			$_to = ( MAIL_TEST != '' )
		    	? MAIL_TEST
		    	: MAIL_CONTACT;
			if ( $debug ) echo "Envoi du message à : " . $_to . "<br><br>";
			
			$message = "Bonjour,<br><br>";
			$message .= "La personne suivante a rempli le formulaire de contact de votre site :<br>";
			$message .= "Nom : <b>" . $_POST[ "nom" ] . " " . $_POST[ "prenom" ] . "</b><br>";
			$message .= "E-mail / Téléphone : <b>" . $_POST[ "email" ] . " / " . $_POST[ "tel" ] . "</b><br>";
			$message .= "Adresse postale : <b>" . $_POST[ "adresse" ] . ", " . $_POST[ "cp" ] . " " . $_POST[ "ville" ] . "</b><br>";
			$message .= "Message : <br><i>" . nl2br( $_POST[ "message" ] ) . "</i><br><br>";
			$message .= "Cordialement.";
			$message = utf8_decode( $message );
			if ( $debug ) echo $message;
			
			if ( !$debug ) $retour = mail( $_to, $sujet, stripslashes( $message ), $entete );
			$retour = mail( $_to, $sujet, stripslashes( $message ), $entete );
			//exit();
			
			$affichage_success = ( $retour ) ? "" : "wait";
			$affichage_erreur = ( $retour ) ? "wait" : "";
		}
		// ------------------------------------------- //
		//exit();
		
	}
	// ------------------------------------------------------- //
?>

<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<title>Contacter AKISTEEL</title>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/meta.php" ); ?>
	</head>
	<body class="contact">
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/header.php" ); ?>
		
		<div class="row fullwidth content" data-equalizer>
			<div class="large-6 medium-6 small-12 columns" data-equalizer-watch>
				<div class="contenu">
					<div class="coordonnees">
						<h1>Contacter AKISTEEL</h1>
						<p>
							AKISTEEL<br/>
							1 ZA la Palue<br/>
							33240 CUBZAC LES PONTS
						</p>
						<p>
							Tél. <a href="tel:+33557614541">05 57 43 15 06</a>
						</p>
					</div>
					<h2>Formulaire de contact</h2>
					
					<div id="div_success" class="large-12 medium-12 small-12 <?=$affichage_success?>">
						<h3>Félicitations!</h3>
						<p>Votre message a été envoyé avec succès!</p>
					</div>
					
					<div id="div_erreur" class="large-12 medium-12 small-12 <?=$affichage_erreur?>">
						<h3>Erreur!</h3>
						<p>
							Une erreur s'est produite lors de l'envoi de votre message.<br>
							Veuillez essayer ultérieurement.
						</p>
					</div>
					
					<form id="formulaire" class="row contact" method="post" action="contact.php">
						<input type="hidden" name="mon_action" id="mon_action" value="" />
						<input type="hidden" name="as" value="" />
						
						<div class="large-6 medium-12 columns">
							<input type="text" name="prenom" id="prenom" placeholder="Votre prénom" />						
						</div>
						<div class="large-6 medium-12 columns">
							<input type="text" name="nom" id="nom" placeholder="Votre nom" />
						</div>
						<div class="large-12 columns">
							<input type="text" name="adresse" placeholder="Votre adresse">
						</div>
						<div class="large-4 medium-5 small-12 columns">
							<input type="text" name="cp" placeholder="Code postal" />						
						</div>
						<div class="large-8 medium-7 small-12 columns">
							<input type="text" name="ville" placeholder="Ville" />
						</div>
						<div class="large-6 medium-12 columns">
							<input type="tel" name="tel" id="tel" placeholder="Votre n° de téléphone" />						
						</div>
						<div class="large-6 medium-12 columns">
							<input type="email" name="email" id="email" placeholder="Votre e-mail" />
						</div>
						<div class="large-12 columns">
							<textarea name="message" id="message" placeholder="Votre message"></textarea>
						</div>
						<div class="large-12 columns">
							<input type="checkbox" id="newsletter" name="newsletter"  checked/> J'accepte de recevoir la newsletter.
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
			<div class="large-6 medium-6 small-12 columns photos" data-equalizer-watch>
				<div id="map-canvas"></div>
			</div>
		</div>
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/footer.php" ); ?>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/scripts.php" ); ?>
		
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCg5uYfOCVANlamT61wSw0VF8necpQVVMo&v=3.exp"></script>
		<script>
			
			$(document).ready(function(){
				$('nav ul li:nth-child(5)').addClass('active');
			});
			
			// ---- Section Gogle Maps ---------------------------------- //
			if ( 1 == 1 ) {
				var map;
				function initialize() {
				
					var mapOptions = {
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						mapTypeControl: false,
						zoom: 12,
						zoomControl: true,
						panControl: false,
						streetViewControl: false,
						scaleControl: false,
						overviewMapControl: false,
						center: new google.maps.LatLng(44.9665366, -0.4551398)
						//center: new google.maps.LatLng(44.858289, -0.5192039999999452)
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
						position: new google.maps.LatLng(44.9665366, -0.4551398),
						map: map,
						icon: icon,
						title: 'AKISTEEL'
					});
					 marker.addListener('click', function() {
					 //window.location.href = 'http://tinyurl.com/zsf4gqo';
					 window.open('https://goo.gl/68dZJA','_blank');
					 });
				
				}
				
				google.maps.event.addDomListener(window, 'load', initialize);
				
				function checkResize(){
				
					var center = map.getCenter();
					google.maps.event.trigger(map, 'resize');
					map.setCenter(center);
				}
				
				window.onresize = checkResize;
			}
			// ---------------------------------------------------------- //
			
			// ---- Validation du formulaire ---------------------------- //
			if ( 1 == 1 ) {
				
				function initialiser() {
					$( "#nom" ).removeClass( "erreur" );
					$( "#prenom" ).removeClass( "erreur" );
					$( "#email" ).removeClass( "erreur" );
					$( "#tel" ).removeClass( "erreur" );
					$( "#message" ).removeClass( "erreur" );
				}
				
				function checkEmail( adr ) {
					if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(adr)) {
							return (true);
					}
					return (false);
				}
				
				$( "#formulaire" ).submit(function() {
					//alert( "validation..." );
					var erreur = 0;
					initialiser();
					
					if ( $.trim( $( "#nom" ).val() ) == '' ) {
						erreur = 1;
						$( "#nom" ).addClass( "erreur" );
					}
					
					if ( $.trim( $( "#prenom" ).val() ) == '' ) {
						erreur = 1;
						$( "#prenom" ).addClass( "erreur" );
					}
					
					if ( $.trim( $( "#email" ).val() ) == '' ) {
						erreur = 1;
						$( "#email" ).addClass( "erreur" );
					}
					else if ( !checkEmail( $.trim( $( "#email" ).val() ) ) ) {
						erreur = 1;
						$( "#email" ).addClass( "erreur" );
					}
					
					if ( $.trim( $( "#tel" ).val() ) == '' ) {
						erreur = 1;
						$( "#tel" ).addClass( "erreur" );
					}
					
					if ( $.trim( $( "#message" ).val() ) == '' ) {
						erreur = 1;
						$( "#message" ).addClass( "erreur" );
					}
					
					if ( erreur == 0 ) $( "#mon_action" ).val( "poster" );
					return ( erreur == 0 ) ? true : false;
				});
			}
			// ---------------------------------------------------------- //
			
		</script>
	</body>
</html>
