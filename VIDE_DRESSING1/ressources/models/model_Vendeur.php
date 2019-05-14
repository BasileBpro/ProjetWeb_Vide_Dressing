<?php

class Vendeur{

	function mVend($code){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");

		$pdoCompte = $pdo->prepare("DELETE FROM acces WHERE `Code` = :code") ;
		$pdoCompte->bindValue(':code', $code);
		$pdoCompte->execute();
		return true;
	}
}
?>