<?php

class FinVente{

	function mVente(){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$sql = "UPDATE vetement SET Statut=\"INVENDU\" WHERE Statut <> \"VENDU\"";
		$pdo->exec($sql);

		return true;
	}
}
?>