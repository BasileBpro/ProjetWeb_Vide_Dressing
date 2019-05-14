<?php

class Ticket{

	function mUpdate($tableau){
		
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$recap = $pdo -> query('UPDATE vetement SET Statut=\"VENDU\" WHERE CodeArticle=\"$tableau\"');//passe les articles du tableau en VENDU
		return true;
	}
	function mRecup($tableau){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$tab = $pdo->prepare('SELECT CodeArticle, Description, Prix, Taille FROM vetement WHERE CodeArticle LIKE :tableau ');
		$tab->bindParam(':tableau', $tableau);
		$tab->execute();
		// $tab = $pdo->query("SELECT * FROM acces");
		$sql = $tab->fetchAll();
		return $sql;
	}
}
?>