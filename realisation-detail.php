<?
	include_once $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/utils.php";
	require( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/inc.config.php" );
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/Categorie.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/Produit.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/Produit_image.php";
	session_start();
	
	$debug = 			false;
	$produit = 			new Produit();
	$produit_image = 	new Produit_image();
	$result = $produit->load( $_GET[ "id" ], $debug );
	//print_pre( $result );
	
	// ---- VERIFICATIONS PREALABLES --------------------------------- //
	if ( 1 == 1 ) {
		
		// ---- Le produit DOIT être en ligne pour être affiché ici!
		if ( $result[ 0 ][ "online" ] == "non" ) {
			if ( $debug ) echo "1 - Produit OFFLINE!<br>";
			if ( !$debug ) header( "Location: /realisations.php" );
			exit();
		}
		
	}
	// --------------------------------------------------------------- //
	
	// ---- Informations à afficher ---------------------------------- //
	if ( 1 == 1 ) {
		
		// ---- Données de l'annonce ------------- //
		$nom = 			$result[ 0 ][ "nom" ];
		$description = 	nl2br( $result[ 0 ][ "description" ] );
		$fichier_pdf = 	$result[ 0 ][ "fichier_pdf" ];
		
		// ---- Image par défaut ----- //
		$image_defaut = $produit_image->getImageDefaut( $result[ 0 ][ "id" ], $debug );
		
		// ---- Liste des images ----- //
		if ( 1 == 1 ) {
			unset( $recherche );
			$recherche["num_produit"] = $result[ 0 ][ "id" ];
			$liste_image = 				$produit_image->getListe( $recherche, $debug );
		}
		
	}
	// --------------------------------------------------------------- //
?>

<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<title>Quelques réalisations AKISTEEL</title>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/meta.php" ); ?>
	</head>
	<body class="realisations">
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/header.php" ); ?>
	
		<div class="row fullwidth content2">
			<div class="row contenu-realisations">
	
				<div class="large-12 columns">
					<h1><?=$nom?></h1>
				</div>
				
				<div class="row">
					<div class="large-7 columns">
						
						<div class="gallery-top">
							<div class="swiper-wrapper">
								<!-- // ---- Affichage des vignettes ------------------ //  -->
								<?php if ( !empty( $liste_image ) ): ?>
									<?php foreach ( $liste_image as $_image ) : ?>
										<div class='swiper-slide'>
											<a href="<?php echo '/photos/produit/normale'. $_image[ 'fichier' ] ?>" class="fancybox photo-principale" rel="offre">
												<img src="<?php echo '/photos/produit/realisation_liste' . $_image[ 'fichier' ] ?>"  alt="" />
											</a>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							
							</div>
							
							<!-- Add Arrows -->
						<!-- <div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div> -->	
						</div>
						
						<div class="gallery-thumbs">
							<div class="swiper-wrapper">
								
								<?
								// ---- Affichage des vignettes ------------------ //
								if ( !empty( $liste_image ) ) {
									foreach ( $liste_image as $_image ) { 
										echo "<div class='swiper-slide'><img src='/photos/produit/vignette" . $_image[ "fichier" ] . "' alt='' /></div>\n";
									}
								}
								// ----------------------------------------------- //
								?>
								
							</div>
						</div>
					</div>
					
					<div class="large-5 columns">
					   <?php if (!empty(trim($description))): ?>
						<h3>Descriptif</h3>
						<p><?=$description?></p>
						<?php endif;?>
						
						<?
						// ---- PDF disponible --------------- //
						if ( $fichier_pdf != '' ) {
							echo "<h3>Ficher Technique</h3>\n";
							echo "<p>\n";
							echo "	Télécharger le fichier PDF :\n";
							echo "	<a href='/fichier/pdf" . $fichier_pdf . "' target='_blank' class='pdf'></a>\n";
							echo "</p>\n";
						}
						// ----------------------------------- //
						?>
					
					</div>
				</div>
			</div>
		</div>
	
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/footer.php" ); ?>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/scripts.php" ); ?>
		
		<script>
			$(document).ready(function(){
				
				//$('.contenu-realisations a').fancybox();
				$('nav ul li:nth-child(3)').addClass('active');	
				
				var galleryTop = new Swiper('.gallery-top', {
			        nextButton: '.swiper-button-next',
			        prevButton: '.swiper-button-prev',
			        spaceBetween: 0,
			    });
			    var galleryThumbs = new Swiper('.gallery-thumbs', {
			        spaceBetween: 10,
			        centeredSlides: true,
			        slidesPerView: 'auto',
			        touchRatio: 0.2,
			        slideToClickedSlide: true
			    });
			    galleryTop.params.control = galleryThumbs;
			    galleryThumbs.params.control = galleryTop;
			    	
			});
		</script>
		
	</body>
</html>
