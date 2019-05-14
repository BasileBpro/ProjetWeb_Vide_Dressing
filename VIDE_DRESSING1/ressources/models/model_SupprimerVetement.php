<?php

class SupprimerVetement{
	
	function mSupprVetement($code){

		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$sql = "DELETE FROM vetement WHERE CodeArticle=\"$code\"";
		$Suppression = $pdo->exec($sql);
		return true;
	}
}
?>