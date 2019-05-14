<?php

class RetirerArticle{
	function mUpdateArticle($codeArticle){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$sql = "UPDATE vetement SET Statut=\"RETIRE\" WHERE CodeArticle=$codeArticle";
		$pdo->exec($sql);
		return true;
	}
}
?>