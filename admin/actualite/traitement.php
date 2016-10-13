<?php
	require '../../inc/inc.config.php';
	require '../classes/utils.php';
	require '../classes/ImageManager.php';
	require '../classes/News.php';
	session_start();
	
	$debug =		false;
	$news =			new News();
	$imageManager = new ImageManager();
	
	// ---- Security ---------------------------------------------------------- //
	if (!isset($_SESSION[ "accessGranted" ]) || !$_SESSION[ "accessGranted" ]) {
		$result = $storageManager->grantAccess($_POST[ "login" ], $_POST[ "mdp" ]);
		if (!$result){
			header('Location: /admin/?action=error');
		} else {
			$_SESSION[ "accessGranted" ] = true;
		}
	}
	// ------------------------------------------------------------------------ //
	
	// ---- Forms processing -------------------------------------------------- //
	if ( $debug ) print_pre( $_POST );
	if ( !empty( $_POST ) ) {
		
		// ---- Traitement des news ------------------------------------------- //
		if ( $_POST[ "mon_action" ] == 'gerer' ) {
			if ( $debug ) echo "Traitement des news...<br>";
			
			// ---- Gestion des images du produit ----------------------------- //
			if ( !empty( $_POST[ "url0" ] ) ) {
				
				$source = $_SERVER[ "DOCUMENT_ROOT" ] . $_POST[ "url0" ];
				if ( $debug ) echo "Source : " . $source . "<br>";
				
				if( strstr( $source, 'uploads' ) ) {
					$filenameDest = $imageManager->fileDestManagement( $source, $_POST[ "id" ] );
					
					// ---- Image normale
					$destination = $_SERVER[ "DOCUMENT_ROOT" ] . '/photos/news/normale' . $filenameDest;
					if ( $debug ) echo "Destination : " . $destination . "<br>";
					$imageManager->imageResize( $source, $destination, 800, 600, null );
					
					// ---- Vignette accueil
					$destination = $_SERVER[ "DOCUMENT_ROOT" ] . '/photos/news/accueil' . $filenameDest;
					if ( $debug ) echo "Destination : " . $destination . "<br>";
					$imageManager->imageResize( $source, $destination, 302, 310, ZEBRA_IMAGE_CROP_CENTER );
					
					// ---- Vignette liste des actualités
					$destination = $_SERVER[ "DOCUMENT_ROOT" ] . '/photos/news/liste_actualite' . $filenameDest;
					if ( $debug ) echo "Destination : " . $destination . "<br>";
					$imageManager->imageResize( $source, $destination, 250, 188, ZEBRA_IMAGE_CROP_CENTER );
					$_POST[ "url0" ] = $filenameDest;
				}
			
				$imageManager = null;	
			}
			else $_POST[ "url0" ] = $_POST[ "image_ancienne" ];
			// ---------------------------------------------------------------- //
			
			// ---- Modifier la news ------------------------------------------ //
			if ( $_POST[ "action" ] == 'modif' ) {
				try {
					$result = $news->newsModify( $_POST, $debug );
					if ( !$debug ) header( "Location: /admin/actualite/liste.php" );
				} 
				catch (Exception $e) {
					echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
					exit();
				}
			}
			// ---------------------------------------------------------------- //
			
			// ---- Ajouter une news ------------------------------------------ //
			else {
				try {
					$result = $news->newsAdd( $_POST, $debug );
					if ( !$debug ) header( "Location: /admin/actualite/edition.php?id=" . $result );
				} 
				catch (Exception $e) {
					echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
					exit();
				}
			}
			// ---------------------------------------------------------------- //
			
		}
		// -------------------------------------------------------------------- //
		
	} 
	// ------------------------------------------------------------------------ //
	
	// ---- GET GET GET ------------------------------------------------------- //
	else if ( $_GET[ "action" ] == 'delete' ) {
		try {
			$result = $news->newsDelete( $_GET[ "id" ] );
			$news = null;
			if ( !$debug ) header( "Location: /admin/actualite/liste.php" );
		} 
		catch (Exception $e) {
			echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
			$news = null;
			exit();
		}
	} 
	// ------------------------------------------------------------------------ //
	
	else {
		header('Location: /admin/');
	}
?>