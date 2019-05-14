<?php

class ModifVendeur{

	function mModifVend($code){

		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$sql = $pdo->query("SELECT * FROM acces WHERE Code = \"$code\"");
		$val = $sql->fetch();
		return $val;
	}
}
?>