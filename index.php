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
			$titre = 		$result[ 0 ][ "titre" ];
			$sous_titre = 	$result[ 0 ][ "sous_titre" ];
			$texte = 		$result[ 0 ][ "contenu" ];
			if ( strlen( $texte ) > 300 ) $texte = substr( $texte, 0, 300 ) . " ...";
			$image = 		"/photos/news/accueil" . $result[ 0 ][ "image" ];
			
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
			$image_gauche = "http://www.placehold.it/302x310/EFEFEF/171717&text=Img gauche";
			$url_gauche = "http://www.google.fr";
			$image_droite = "http://www.placehold.it/302x310/EFEFEF/171717&text=Img droite";
			$url_droite = "http://www.iconeo.fr";
			
			$contenu_popup .= "<div class='large-6 medium-6 small-12 columns'>\n";
			$contenu_popup .= "	<a href='" . $url_gauche . "' target='_blank'><img src='" . $image_gauche . "' alt='' /></a>\n";
			$contenu_popup .= "</div>\n";$contenu_popup .= "<div class='large-6 medium-6 small-12 columns'>\n";
			$contenu_popup .= "	<a href='" . $url_droite . "' target='_blank'><img src='" . $image_droite . "' alt='' /></a>\n";
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
		
		<div class="popup">
			<div class="row">
				<a class="close">X</a>
				<?=$contenu_popup?>
			</div>
		</div>
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/header.php" ); ?>
		
		<div class="row fullwidth content">
			<div class="large-6 medium-6 small-12 columns">
				<div class="contenu">
					<div class="quoi">
						<h1>C'est <span>quoi</span> ?</h1>
						<p>
							Consectetur adipiscing elit. Suspendisse quis risus nec elit pharetra ultrices at id dui. Sed lobortis diam in adipiscing volutpat. Etiam volutpat in ipsum ut ultricies. Phasellus id bibendum quam. Sed justo felis, consequat sed magna vitae, rutrum auctor quam.
						</p>
					</div>
					<div class="quel-style">
						<h2>Quel <span>style</span> ?</h2>
						<p>
							Consectetur adipiscing elit. Suspendisse quis risus nec elit pharetra ultrices at id dui.
						</p>
						<p>
							Sedlobo rtis diam in adipiscing volutpat. Etiam volutpat in ipsum ut ultricies. Phasellus id bibendum quam. Sed justo felis, consequat sed magna vitae, rutrum auctor quam.
						</p>
					</div>					
				</div>
			</div>
			<div class="large-6 medium-6 small-12 columns photos">
				<div class="vue-de-chantier flex">
					<p>
						Vue<br/>
						de chantier
					</p>
				</div>
				<div class="bulle flex">
					<p>
						<span>escalier</span>
						création sur mesure
					</p>
				</div>
				<div class="swiper-container flex">
					<div class="swiper-wrapper">
						<div class="swiper-slide" style="background-image:url('img/reference-01.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-01.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-01.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-01.jpg');"></div>
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
			var swiper = new Swiper('.swiper-container', {
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				slidesPerView: 1,
				paginationClickable: true,
				spaceBetween: 0,
				loop: true
			});
			$(document).ready(function(){
				$('nav ul li:nth-child(1)').addClass('active');
			});
		</script>
	</body>
</html>
