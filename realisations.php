<?
	include_once $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/utils.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/inc.config.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/Produit.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/Produit_image.php";
	
	$debug = 			false;
	$categorie = 		new Categorie();
	$produit = 			new Produit();
	$produit_image =	new Produit_image();
	
	// ---- Liste des catégories de niveau 0 ------ //
	if ( 1 == 1 ) {
		unset( $recherche );
		$recherche[ "id_parent" ] = 0;
		$liste_categorie = $categorie->getListe( $recherche, $debug );
	}
	// -------------------------------------------- //
	
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
                    					<div class="vue-de-chantier2 flex">
                    					<p>
                    						Quelques<br/>
                    						réalisations
                    					</p>
                    				</div>
                    				
				</div>
				
				<?
				// ---- Affichage des onglets ---------------------------------------- //
				if ( !empty( $liste_categorie ) ) {
					$i = 0;
					echo "<ul class='tabs' data-tab>\n";
					
					foreach ( $liste_categorie as $_categorie ) {
						$actif = ( $i == 0 ) ? "active" : "";
						
						echo "<li class='tab-title " . $actif . "'><a href='#panel" . $_categorie[ "id" ] . "'>" . $_categorie[ "nom" ] . "</a></li>\n";
						$i++;
					}
					
					echo "</ul>\n";
				}
				// ------------------------------------------------------------------- //
				
				
				// ---- Affichage du contenu des catégories -------------------------- //
				if ( !empty( $liste_categorie ) ) {
					$i = 0;
					echo "<div class='tabs-content'>\n";
					
					foreach ( $liste_categorie as $_categorie ) {
						$actif = ( $i == 0 ) ? "active" : "";
						
						// ---- Recherche des sous-catégories ----- //
						unset( $recherche );
						$recherche[ "id_parent" ] = $_categorie[ "id" ];
						$liste_sous_categorie = $categorie->getListe( $recherche, $debug );
						// ---------------------------------------- //
						
						echo "<div class='content " . $actif . "' id='panel" . $_categorie[ "id" ] . "'>\n";
						
						if ( !empty( $liste_sous_categorie ) ) {
							foreach ( $liste_sous_categorie as $_sous_categorie ) {
								echo "<h3>" . $_sous_categorie[ "nom" ] . "</h3><br>\n";
								
								// ---- Recherche & affichage des produits disponibles pour cette sous catégorie ---- //
								if ( 1 == 1) {
									unset( $recherche );
									$recherche[ "id_categorie" ] = 	$_sous_categorie[ "id" ];
									$recherche[ "online" ] = 		'1';
									$liste_produit = $produit->getListe( $recherche, $debug );
									
									if ( !empty( $liste_produit ) ) {
										foreach ( $liste_produit as $_produit ) {
											$id_produit = 	$_produit[ "id" ];
											$nom = 			$_produit[ "nom" ];
											$image_defaut = $produit_image->getImageDefaut( $id_produit, $debug );
											
											echo "<div class='large-4 medium-4 small-12 columns'>\n";
											echo "	<figure>\n";
											echo "		<a href='/realisation-detail.php?id=" . $id_produit . "'><img src='/photos/produit/realisation_liste" . $image_defaut[ "fichier" ] . "' title='" . $nom . "' /></a>\n";
											echo "		<figcaption>" . $nom . "</figcaption>\n";
											echo "	</figure>\n";
											echo "</div>\n";
										}
										
										echo "	<div style='clear:both;'></div>\n";
									}
								}
								// ---------------------------------------------------------------------------------- //
								
							}
						}
						
						// ---- Recherche & affichage des réalisations disponibles pour cette catégorie
						if ( 1 == 1) {
							unset( $recherche );
							$recherche[ "id_categorie" ] = 	$_categorie[ "id" ];
							$recherche[ "online" ] = 		'1';
							$liste_produit = $produit->getListe( $recherche, $debug );
							
							if ( !empty( $liste_produit ) ) {
								echo "<h3>" . $_categorie[ "nom" ] . "</h3><br>\n";
								
								foreach ( $liste_produit as $_produit ) {
									$id_produit = 	$_produit[ "id" ];
									$nom = 			$_produit[ "nom" ];
									$image_defaut = $produit_image->getImageDefaut( $id_produit, $debug );
									
									echo "<div class='large-4 medium-4 small-12 columns'>\n";
									echo "	<figure>\n";
									echo "		<a href='/realisation-detail.php?id=" . $id_produit . "'><img src='/photos/produit/realisation_liste" . $image_defaut[ "fichier" ] . "' /></a>\n";
									echo "		<figcaption>" . $nom . "</figcaption>\n";
									echo "	</figure>\n";
									echo "</div>\n";
								}
								
								echo "	<div style='clear:both;'></div>\n";
							}
						}
						// -------------------------------------------- //
						
						echo "</div>\n";
						
						$i++;
					}
					
					echo "</div>\n";
				}
				// ------------------------------------------------------------------- //
				?>
				
				
				<!--<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>-->
					
			</div>
		</div>
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/footer.php" ); ?>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/scripts.php" ); ?>
		
		<script>
			$(document).ready(function(){
				//$('.contenu-realisations a').fancybox();
				$('nav ul li:nth-child(3)').addClass('active');		
			});
		</script>
		
	</body>
</html>
