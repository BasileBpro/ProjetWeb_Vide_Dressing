<?php

class chmtStatutVetement{

	function mCode($code){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$sql = "UPDATE vetement SET Statut=\"NON PRESENT\" WHERE CodeArticle=$code";
		$pdo->exec($sql);
		return true;
	}
}
?>