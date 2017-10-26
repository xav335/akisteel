<?

	// ---- D�finition des constantes du site ------------------------ //
	//echo $_SERVER[ "DOCUMENT_ROOT" ] . "<br>";
	switch( $_SERVER[ "DOCUMENT_ROOT" ] ) {
		
		// ---- Serveur local Franck -------- //
		case "/var/www/akisteel" :
			$localhost = "localhost";
			$dbname = "akisteel";
			$user = "global";
			$mdp = "global";
			break;
		
		// ---- Serveur PRE-PROD ------------ //
		case "/home/web/akisteel" :
			$localhost = "localhost";
			$dbname = "akisteel";
			$user = "akisteel";
			$mdp = "akisteel33";
			break;
		
		// ---- Serveur PROD ---------------- //
		case "/var/www/akisteel" :
			$localhost = "localhost";
			$dbname = "akisteel";
			$user = "akisteel";
			$mdp = "akisteel33";
			break;
		default:
		    $localhost = "localhost";
		    $dbname = "akisteel";
		    $user = "akisteel";
		    $mdp = "akisteel33";
		    break;
	}
		
	define( "DBHOST",	$localhost );
	define( "DBNAME",	$dbname );
	define( "DBUSER",	$user );
	define( "DBPASSWD", $mdp );
	
	define( "MAILCUSTOMER", 	"NePasRepondre@akisteel.com" );
	define( "MAILNAMECUSTOMER", "Akisteel" );
	define( "URLSITEDEFAULT", 	"http://www.akisteel.com/" );
	define( "FACEBOOK_LINK", 	"https://www.facebook.com/Akisteel-1327101094038965/" );
	define( "DAILYMOTION_LINK", "#" );
	
	// ---- Mail d'envoi
	define( "MAIL_TEST", 	"" ); // Si rempli alors cette valeur ser utilisée pour les différents envois de mails
	define( "MAIL_CONTACT", "contact@akisteel.fr" );
	define( "MAIL_BCC", 	"xav335@hotmail.com,fjavi.gonzalez@gmail.com,jav_gonz@yahoo.com" );
?>
