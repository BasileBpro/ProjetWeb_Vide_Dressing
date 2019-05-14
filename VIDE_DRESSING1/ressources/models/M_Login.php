<?php

class MLoginMail{


	function mMail($email, $mdp){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$Email = $pdo->prepare("SELECT count(*) FROM acces WHERE `Email` = :email AND `Mot de passe` = :mdp") ;
		$Email->bindValue(':email', $email);
		$Email->bindValue(':mdp', $mdp) ;
		$Email->execute();
		$test = $Email->fetchColumn();
		return $test;
	}

	function mAutorisation($email){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$EmailAuto = $pdo->prepare("SELECT count(*) FROM acces WHERE `Autorisation` = 1 AND `Email` = :email");
		$EmailAuto->bindValue(':email', $email);
		$EmailAuto->execute();
		$test = $EmailAuto->fetchColumn();
		return $test;
	}
	function mRecupTrigramme($email){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$Tri = $pdo->prepare("SELECT Code FROM acces WHERE Email = \"$email\"");
		$Tri->execute();
		return $Tri->fetchAll(PDO::FETCH_ASSOC);
	}
	function mRecupId($tri){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$Tri = $pdo->prepare("SELECT idLISTE FROM liste WHERE Trigramme = \"$tri\"");
		$Tri->execute();
		return $Tri->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>