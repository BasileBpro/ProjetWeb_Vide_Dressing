<?php

class ConvPDF{

	function mSelectArticle($nomListe){

		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$tab = $pdo->prepare("SELECT CodeArticle, Description, Prix, statut, taille FROM vetement WHERE vetement.LISTE_idLISTE= :nomListe");
		$tab->bindParam(':nomListe', $nomListe);
		$tab->execute();
		$sql = $tab->fetchAll();
		return $sql;								
	}
	function mSelectSum($tri){

		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");

		$recap = $pdo -> prepare('SELECT SUM(prix) FROM vetement WHERE (vetement.LISTE_idLISTE=(SELECT idListe From Liste where trigramme= :tri)) AND vetement.Statut=\"VENDU\"');
		$recap->bindValue(':tri', $tri);
		$resultat = $recap->execute();
		return $resultat;
	}
}
?>