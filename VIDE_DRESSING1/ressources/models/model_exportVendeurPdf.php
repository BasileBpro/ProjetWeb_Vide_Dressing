<?php
class exportVendeurPdf{

	function mpdoVendeur(){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$tab = $pdo->query("SELECT * FROM acces");
		$sql = $tab->fetchAll();
		return $sql;								
	}
}
?>