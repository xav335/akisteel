<?php
require_once("StorageManager.php");
class News extends StorageManager {

	public function __construct(){

	}
	
	public function newsAccueilGet( $debug=false ){
		$this->dbConnect();
		$requete = "SELECT * FROM `news` 
			WHERE accueil = 1  
			AND online = 1 
			ORDER BY `date_news` DESC
			LIMIT 0, 1" ;
		if ( $debug ) echo $requete . "<br>";
		
		$new_array = null;
		$result = mysqli_query($this->mysqli,$requete);
		while( $row = mysqli_fetch_assoc( $result)){
			$new_array[] = $row;
		}
		$this->dbDisConnect();
		return $new_array;
	}
	
	public function newsValidGet( $debug=false ){
		$this->dbConnect();
		$requete = "SELECT * FROM `news` WHERE online=1 ORDER BY `date_news` DESC" ;
		if ( $debug ) echo $requete . "<br>";
		
		$new_array = null;
		$result = mysqli_query($this->mysqli,$requete);
		while( $row = mysqli_fetch_assoc( $result)){
			$new_array[] = $row;
		}
		$this->dbDisConnect();
		return $new_array;
	}
	
	public function newsGet( $id, $debug=false ){
		 $this->dbConnect();
		if ( !isset( $id ) || intval( $id ) <= 0 ) {
			$requete = "SELECT * FROM `news` ORDER BY date_news DESC" ;
		} 
		else {
			$requete = "SELECT * FROM `news` WHERE id_news=" . $id ;
		}
		
		if ( $debug ) echo $requete . "<br>";
		$new_array = null;
		$result = mysqli_query($this->mysqli,$requete);
		while( $row = mysqli_fetch_assoc( $result)){
			$new_array[] = $row;
		}
		$this->dbDisConnect();
		return $new_array;
	}
	
	public function newsAdd( $value, $debug=false ) {
		$this->dbConnect();
		$this->begin();
		
		try {
			( $value[ "accueil" ] == 'on' ) ? $accueil = 1 : $accueil = 0;
			( $value[ "online" ] == 'on' ) ? $online = 1 : $online = 0;
			
			$sql = "INSERT INTO  `news`
				(`date_news`, `titre`, `sous_titre`, `contenu`, `image`, `accueil`, `online`)
				VALUES (
				'" . $this->inserer_date( $value[ "datepicker" ] ) . "', 
				'" . addslashes( $value[ "titre" ] ) . "',
				'" . addslashes( $value[ "sous_titre" ] ) . "',
				'" . addslashes( $value[ "contenu" ] ) . "',
				'" . addslashes( $value[ "url0" ] ) . "',
				" . $accueil . ",
				" . $online . "
			);";
			
			if ( $debug ) echo $sql . "<br>";
			else {
				$result = mysqli_query($this->mysqli,$sql);
				
				if (!$result) {
					throw new Exception($sql);
				}
				$id_record = mysqli_insert_id($this->mysqli);
				$this->commit();
			}
		
		} 
		catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
		$this->dbDisConnect();
		return $id_record;
	}
	
	public function newsModify( $value, $debug=false ) {
		$this->dbConnect();
		$this->begin();
		try {
			( $value[ "accueil" ] == 'on' ) ? $accueil = 1 : $accueil = 0;
			( $value[ "online" ] == 'on' ) ? $online = 1 : $online = 0;
			
			$sql = "UPDATE  .`news` SET
				`date_news`='" . $this->inserer_date( $value[ "datepicker" ] ) . "', 
				`titre`='" . addslashes( $value[ "titre" ] ) . "', 
				`sous_titre`='" . addslashes( $value[ "sous_titre" ] ) . "', 
				`contenu`='" . addslashes( $value[ "contenu" ] ) . "',
				`image`='" . addslashes( $value[ "url0" ] ) . "',
				`accueil`=" . $accueil . ",
				`online`=" . $online . "
				WHERE `id_news`=" . $value[ "id" ] . ";";
			
			if ( $debug ) echo $sql . "<br>";
			else {
			$result = mysqli_query($this->mysqli,$sql);
				
				if (!$result) {
					throw new Exception($sql);
				}
			
				$this->commit();
			}
		
		} catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
		
		
		$this->dbDisConnect();
	}
	
	public function newsDelete($value){
		//print_r($value);
		//exit();
		
		$this->dbConnect();
		$this->begin();
		try {
			$sql = "DELETE FROM  .`news` 
			WHERE `id_news`=" . $value . ";";
			$result = mysqli_query($this->mysqli,$sql);
			
			if (!$result) {
				throw new Exception($sql);
			}
			
			$this->commit();
		} 
		catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
		
		$this->dbDisConnect();
	}
	
}