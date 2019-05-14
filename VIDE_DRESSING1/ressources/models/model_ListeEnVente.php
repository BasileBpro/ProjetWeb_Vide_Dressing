<?php

class ListeEnVente{

	function mUpListe($liste){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$sql = "UPDATE liste SET Statut=\"EN VENTE\" WHERE idLISTE=$liste";
		$pdo->exec($sql);
		return true;
	}
	function mSelectListe($liste){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$tab = $pdo->prepare("SELECT * FROM vetement where LISTE_idLISTE= :liste");
		$tab->bindParam(':liste', $liste);
		$tab->execute();
		$sql = $tab->fetchAll();
		return $sql;
	}
}
?>