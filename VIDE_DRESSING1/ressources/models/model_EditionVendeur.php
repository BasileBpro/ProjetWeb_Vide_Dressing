<?php

class EditionVendeur{

	function mRecap($trigramme){

		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$recap = $pdo->prepare('SELECT CodeArticle, Description, Prix, Statut, Taille FROM vetement WHERE vetement.LISTE_idLISTE=(SELECT idListe From Liste WHERE Trigramme= :tri)');
		$recap->bindParam(':tri', $trigramme);
		$recap->execute();
		$sql = $recap->fetchAll();
		return $sql;
	}
	function mRecapAll($trigramme){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");

		$recap = $pdo->prepare('SELECT SUM(prix) FROM vetement WHERE (vetement.LISTE_idLISTE=(SELECT idListe From Liste where trigramme= :tri)) AND vetement.Statut="VENDU"');
		$recap->bindParam(':tri', $trigramme);
		$recap->execute();
		$sql = $recap->fetchAll();
		return $sql;
	}
}

?>