<?
	include_once $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/utils.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/inc.config.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/Produit.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/Produit_image.php";
	
	$debug = 			false;
	$categorie = 		new Categorie();
	$produit = 			new Produit();
	$produit_image =	new Produit_image();
	
	$num_categorie = 	$_GET[ "nc" ];
	$data_categorie = 	$categorie->load( $num_categorie, $debug );
	
	// ---- Liste des catégories de niveau 0 ------ //
	if ( 1 == 1 ) {
		unset( $recherche );
		$recherche[ "id_parent" ] = 0;
		$recherche[ "order_by" ] = 	"ordre_affichage";
		$liste_categorie = $categorie->getListe( $recherche, $debug );
		
		// ---- Si pas encore de catégorie sélectionnée, on prend la 1ier
		if ( empty( $data_categorie ) ) {
			if ( !empty( $liste_categorie ) ) {
				$num_categorie = $liste_categorie[ 0 ][ "id" ];
				$data_categorie = $categorie->load( $num_categorie, $debug );
			}
		}
	}
	// -------------------------------------------- //
	
	// ---- Sous catégories & réalisations d'une catégorie parent sélectionnée
	if ( !empty( $data_categorie ) ) {
		
		// ---- Liste des sous catégories --------- //
		if ( 1 == 1 ) {
			unset( $recherche );
			$recherche[ "id_parent" ] = $num_categorie;
			$recherche[ "order_by" ] = 	"ordre_affichage";
			$liste_sous_categorie = $categorie->getListe( $recherche, $debug );
			//print_pre( $liste_sous_categorie );
		}
		// ---------------------------------------- //
		
		// ---- Recherche & affichage des réalisations disponibles pour cette catégorie principale
		if ( 1 == 1) {
			unset( $recherche );
			$recherche[ "id_categorie" ] = 	$num_categorie;
			$recherche[ "online" ] = 		'1';
			$liste_produit = $produit->getListe( $recherche, $debug );
		}
		// ---------------------------------------- //
		
	}
	// -------------------------------------------- //
	
?>

<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<title>Réalisations AKISTEEL - Escaliers - Gardes Corps - Portails</title>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/meta.php" ); ?>
	</head>
	<body class="realisations">
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/header.php" ); ?>
		
		<div class="row fullwidth content2">
			<div class="row contenu-realisations">
				
				<div class="titre3">
    				<div class='large-12 medium-12 small-12 columns'>
    				<?
    				// ---- Affichage des catégories principales ------------------------- //
    				if ( !empty( $liste_categorie ) ) {
    					echo "<ul class='tabs' data-tab>\n";
    					
    					foreach ( $liste_categorie as $_categorie ) {
    						$actif = ( $_categorie[ "id" ] == $num_categorie ) ? "active" : "";
    						echo "<li class='tab-title " . $actif . "'><a href='./realisations.php?nc=" . $_categorie[ "id" ] . "'>" . $_categorie[ "nom" ] . "</a></li>\n";
    					}
    					
    					echo "</ul>\n</div><div class='large-12 columns'>";
    				}
    				// ------------------------------------------------------------------- //
    				
				
				// ---- Affichage des sous catégories -------------------------------- //
				if ( !empty( $liste_sous_categorie ) ) {
					foreach ( $liste_sous_categorie as $_sous_categorie ) {
						echo "<h3>" . $_sous_categorie[ "nom" ] . "</h3><br>\n";
						
						// ---- Recherche & affichage des réalisations disponibles pour cette sous catégorie
						if ( 1 == 1) {
							unset( $recherche );
							$recherche[ "id_categorie" ] = 	$_sous_categorie[ "id" ];
							$recherche[ "online" ] = 		'1';
							$__liste_produit = $produit->getListe( $recherche, $debug );
							
							if ( !empty( $__liste_produit ) ) {
								foreach ( $__liste_produit as $_produit ) {
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
						// ------------------------------------------------------------ //
						
					}
				}
				// ------------------------------------------------------------------- //
						
				// ---- Affichage des réalisations disponibles pour cette catégorie principale
				if ( !empty( $liste_produit ) ) {
					echo "<h3>" . $data_categorie[ 0 ][ "nom" ] . "</h3><br>\n";
					
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
				// ------------------------------------------------------------------- //
				?>
				
				</div>
					
			</div>
		</div>
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/footer.php" ); ?>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/scripts.php" ); ?>
		
		<script>
			$(document).ready(function(){
				//$('.contenu-realisations a').fancybox();
				$('nav ul li:nth-child(2)').addClass('active');		
			});
		</script>
		
	</body>
</html>
