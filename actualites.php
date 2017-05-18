<? 
	include_once $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/utils.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/inc.config.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/News.php";
	session_start();
	
	$debug = 	false;
	$news = 	new News();
	
	// ---- Liste des actualités en ligne ---- //
	$liste_actualite = $news->newsValidGet( $debug );
	//print_pre( $liste_actualite );
?>

<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<title>Actualités AKISTEEL</title>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/meta.php" ); ?>
	</head>
	<body class="realisations">
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/header.php" ); ?>
		
		<!-- Actualités -->
		<div class="row fullwidth content2">
			<div class="row contenu-realisations">
				<div class="large-12 columns">
					<h1>Nos actus et évènements</h1>
				</div>
				<div class="actualite">
			
        			<?
        			if ( !empty( $liste_actualite ) ) {
        				foreach( $liste_actualite as $_actualite ) {
        					echo "<a name='" . $_actualite[ "id_news" ] . "'></a>\n";
        					echo "<div class='row'>\n";
        					echo "	<div class='large-4 medium-4 small-12 columns'>\n";
        					echo "		<a href='photos/news/normale" . $_actualite[ "image" ] . "' class='fancybox'><img src='/photos/news/liste_actualite" . $_actualite[ "image" ] . "' alt='' /></a>\n";
        					echo "	</div>\n";
        					echo "	<div class='large-8 medium-8 small-12 columns'>\n";
        					echo "		<h3>" . $_actualite[ "titre" ] . "</h3>\n";
        					echo "		<h4>" . $_actualite[ "sous_titre" ] . "</h4>\n";
        					echo "		<p>" . $_actualite[ "contenu" ] . "</p>\n";
        					echo "	</div>\n";
        					
        					echo "</div>\n";
        					echo "	<hr>";
        				}
        			}
        			?>
			     </div>
			      <div class="large-6 columns">
					 <img alt="" src="img/soudeur.jpg">
				</div>
			     <div class="large-6 columns">
					 <img alt="" src="img/escal.jpg">
				</div>
			    
			</div>
		</div>
		<!-- Fin Actualités -->
	
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/footer.php" ); ?>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/scripts.php" ); ?>
		
		<script>
			
			$(document).ready(function(){
				$('nav ul li:nth-child(3)').addClass('active');
			});
		</script>
	</body>
</html>
