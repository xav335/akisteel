<?
	include_once $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/utils.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/inc.config.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/News.php";
	
	$debug = 	false;
	$news = 	new News();
	
	// ---- Informations du cadre -------------------------- //
	if ( 1 == 1 ) {
		$contenu_popup = '';
		$result = $news->newsAccueilGet( $debug );
		//print_pre( $result[ 0 ] );
		
		// ---- On place une actu dans le cadre ------------ //
		if ( !empty( $result ) ) {
			$classe_popup = "popup_centre";
			$titre = 		$result[ 0 ][ "titre" ];
			$sous_titre = 	$result[ 0 ][ "sous_titre" ];
			$texte = 		$result[ 0 ][ "contenu" ];
			if ( strlen( $texte ) > 200 ) $texte = substr( $texte, 0, 200 ) . " ...";
			$image = 		"/photos/news/liste_actualite" . $result[ 0 ][ "image" ];
			
			$contenu_popup .= "<div class='large-6 medium-6 small-12 columns'>\n";
			$contenu_popup .= "	<div class='text-popup'>\n";
			$contenu_popup .= "		<p>" . $titre . "</p>\n";
			$contenu_popup .= "		<p>" . $sous_titre . "</p>\n";
			$contenu_popup .= "		<p>" . $texte . "<br><a href='actualites.php#" . $result[ 0 ][ "id_news" ] . "'>Lire la suite</a></p>\n";
			$contenu_popup .= "	</div>\n";
			$contenu_popup .= "</div>\n";
			$contenu_popup .= "<div class='large-6 medium-6 small-12 columns'>\n";
			$contenu_popup .= "	<img src='" . $image . "' alt='' />\n";
			$contenu_popup .= "</div>\n";
		}
		// ------------------------------------------------- //
		
		// ---- Liens de redirection vers autres sites ----- //
		else {
			$classe_popup =	"popup";
			$image_gauche = "http://www.placehold.it/302x310/EFEFEF/171717&text=Img gauche";
			$url_gauche = 	"http://www.google.fr";
			$image_droite = "http://www.placehold.it/302x310/EFEFEF/171717&text=Img droite";
			$url_droite = 	"http://www.iconeo.fr";
			
// 			$contenu_popup .= "<div class='large-6 medium-6 small-12 columns'>\n";
// 			$contenu_popup .= "	<a href='" . $url_gauche . "' target='_blank'><img src='" . $image_gauche . "' alt='' /></a>\n";
// 			$contenu_popup .= "</div>\n";$contenu_popup .= "<div class='large-6 medium-6 small-12 columns'>\n";
// 			$contenu_popup .= "	<a href='" . $url_droite . "' target='_blank'><img src='" . $image_droite . "' alt='' /></a>\n";
// 			$contenu_popup .= "</div>\n";
			
			$contenu_popup .= "<div class='large-12 medium-12 small-12 columns'>\n";
			$contenu_popup .= "	<a href='http:\/\/www.akidoor.net' target='_blank'><img src='img/akidoor.png'  alt='' /></a>\n";
			$contenu_popup .= "</div>\n";
		}
		// ------------------------------------------------- //
		
	}
	// ----------------------------------------------------- //
?>

<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<title>AKISTEEL</title>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/meta.php" ); ?>
	</head>
	<body>
		
		<div id="popup" class="<?=$classe_popup?>">
			<div class="row">
				<a class="close">X</a>
				<?=$contenu_popup?>
			</div>
		</div>
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/header.php" ); ?>
		
		<div class="row fullwidth content" data-equalizer>
			<div class="large-6 medium-6 small-12 columns" data-equalizer-watch>
				<div class="contenu">
					<div class="quoi">
						<h3>Qui <span>sommes-</span>nous ?</h3>
						<p>
							<span class="blanc">AKI</span><span class="gris">STEEL</span> est une entreprise œuvrant dans le domaine de la métallerie-serrurerie. 
							
                            Elle est dirigée par JEAN- PIERRE DEVEAUX et SEBASTIEN CHALMEY, qui ont su s’entourer d’une équipe de <span class="underl">techniciens 
                            et technico-commerciaux qualifiés, dotés d’une riche expérience.</span>
                            <br>
                            Nous sommes situés dans le sud-ouest de la France, en Nouvelle-Aquitaine, dans le département de la gironde.
                            <br>
                            <span class="underl">Notre atelier de fabrication</span> où nous concevons vos ouvrages métalliques se trouve à IZON entre LIBOURNE et BORDEAUX.
						</p>
						
					</div>
					<div class="quel-style">
						<h3>Nos <span>Prestations</span> ?</h3>
						<p>
							<span class="blanc">AKI</span><span class="gris">STEEL</span> s'adresse autant aux <strong>particuliers</strong> 
							qu'au <strong>secteur industriel, tertiaire</strong> et <strong>collectif</strong>.
                    	
							 Proposant la <strong>pose</strong> et la <span class="underl">fabrication sur mesure</span> de vos:
						</p>	
							<ul>
    							<li>Escaliers</li>
    							<li>Garde-corps</li>
    							<li>Portails et portillons</li>
    							<li>Portes industrielles</li>
    							<li>Portes de garage</li>
    							<li>Portes d’issus de secours</li>
    							<li>Accès parking</li>
    							<li>Menuiseries décoratives</li>
    							<li>Divers ouvrages métalliques</li>
    						</ul> 
    					<p>	
    						Mais aussi la <span class="underl">rénovation</span> et le <span class="underl">remplacement de l'existant</span> 
						</p>
					</div>	
					
					<div class="quoifin">
        				<p>
        					<span class="blanc">AKI</span><span class="gris">STEEL</span> s'engage à vous offrir des <strong>solutions complètes et adaptées</strong> à vos différents besoins. <br>
                            <span class="blanc">AKI</span><span class="gris">STEEL</span> réunie <span class="underl">expertise, réactivité et proximité.</span><br>
                                Confiez-nous vos projets, nous mettrons tout en œuvre pour les mener à bien.<br>
        
                              N'hésitez pas à <a href="contact.php"> nous contacter</a> pour devis ou informations complémentaires<br>
        				</p>
        			</div>
				</div>
			</div>
			<div class="large-6 medium-6 small-12 columns photos" data-equalizer-watch>
				<div class="vue-de-chantier flex" onclick="location.href='realisations.php'" style="cursor: pointer;">
					<p>
						Vue<br/>
						de chantier
					</p>
				</div>
				<div class="bulle flex" onclick="location.href='realisations.php'" style="cursor: pointer;">
					<p>
						<span>création sur mesure</span>
						
					</p>
				</div>
				<div class="swiper-container flex">
					<div class="swiper-wrapper">
					    <div class="swiper-slide" style="background-image:url('img/reference-00.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-001.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-002.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-003.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-004.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-005.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-006.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-007.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-008.jpg');"></div>
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
			
			
		</div>
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/footer.php" ); ?>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/scripts.php" ); ?>

		<script>
			
			$(document).ready(function(){
				$('nav ul li:nth-child(1)').addClass('active');
			});
			
			var swiper = new Swiper('.swiper-container', {
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				autoplay: 4000,
				slidesPerView: 1,
				paginationClickable: true,
				spaceBetween: 0,
				loop: true
			});
			
			// ---- Fermeture du popup -------------- //
			$( ".close" ).click(function() {
				$( "#popup" ).fadeOut();
			});
			
		</script>
	</body>
</html>
