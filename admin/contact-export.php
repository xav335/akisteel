<?php include_once '../inc/inc.config.php'; ?>
<?php include_once 'inc-auth-granted.php';?>
<?php include_once 'classes/utils.php';?>
<?php 
require 'classes/Contact.php';

$contact = new Contact();

	try {
		$result = $contact->contactExportCSV();
		$contact = null;
		header('Location: /admin/contact-import.php');
	} catch (Exception $e) {
		echo 'Erreur contactez votre administrateur <br> :',  $e->getMessage(), "\n";
		$contact = null;
		exit();
	}

?>