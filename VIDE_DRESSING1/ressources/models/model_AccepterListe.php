<?php

class AcceptListe{

	function mAccepterListe(){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$liste=$_POST["Acceptation"];
		$sql = "UPDATE liste SET Statut=\"ACCEPTEE\" WHERE idLISTE=\"$liste\"";
		//requête sql qui passe la liste donnée dans le formulaire de la page précédente en statut 	
		$update = $pdo->exec($sql);

		return true;
	}
}
?>