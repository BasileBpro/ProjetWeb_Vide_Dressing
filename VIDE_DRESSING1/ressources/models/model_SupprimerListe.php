<?php

class model_SupprimerListe{

	function mSupprListe($nomListe){

		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$sql = "DELETE FROM liste WHERE trigramme=\"$nomListe\"";
		$Suppression = $pdo->exec($sql);
		return true ;
	}
}
?>