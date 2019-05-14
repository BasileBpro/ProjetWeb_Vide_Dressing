<?php

class Ajout{
	
	function mAjout($email){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$pdoEmail = $pdo->prepare("SELECT count(*) FROM acces WHERE Email= :email") ;
		$pdoEmail->bindValue(':email', $email) ;
		$pdoEmail->execute();
		$pdoEmail->fetchColumn();
		return $pdoEmail;
	}

	function mVerifTri($code){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$pdoEmail = $pdo->prepare("SELECT count(*) FROM acces WHERE Code= :code") ;
		$pdoEmail->bindValue(':code', $code);
		$pdoEmail->execute();
		$pdoEmail->fetchColumn();
		return $pdoEmail;
	}

	// function mAjoutComplet($code, $nom, $prenom, $email, $tel, $adresse, $codepostal, $ville, $mdp){
	// 	$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
	// 	$ajout = $pdo->prepare("INSERT INTO `acces`(`Code`, `Nom`, `Prenom`, `Email`, `Telephone`, `Adresse`, `CodePostal`, `Ville`, `Mot de passe`) VALUES (:code, :nom, :prenom, :email, :tel, :adresse, :codepostal, :ville, :mdp)");
	// 	$ajout->bindValue(':code', $code);
	// 	$ajout->bindValue(':nom', $nom);
	// 	$ajout->bindValue(':prenom', $prenom);
	// 	$ajout->bindValue(':email', $email);
	// 	$ajout->bindValue(':tel', $tel);
	// 	$ajout->bindValue(':adresse', $adresse);
	// 	$ajout->bindValue(':codepostal', $codepostal);
	// 	$ajout->bindValue(':ville', $ville);
	// 	$ajout->bindValue(':mdp', $mdp);
	// 	$ajout->execute();
	// 	return true;
	// }
	function mAjoutComplet($code, $nom, $prenom, $email, $tel, $adresse, $codepostal, $ville, $mdp, $autori){
		$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
		$ajout = $pdo->prepare("INSERT INTO `acces`(`Code`, `Nom`, `Prenom`, `Email`, `Telephone`, `Adresse`, `CodePostal`, `Ville`, `Mot de passe`, `Autorisation`) VALUES (:code, :nom, :prenom, :email, :tel, :adresse, :codepostal, :ville, :mdp , :auto)");
		$ajout->bindValue(':code', $code);
		$ajout->bindValue(':nom', $nom);
		$ajout->bindValue(':prenom', $prenom);
		$ajout->bindValue(':email', $email);
		$ajout->bindValue(':tel', $tel);
		$ajout->bindValue(':adresse', $adresse);
		$ajout->bindValue(':codepostal', $codepostal);
		$ajout->bindValue(':ville', $ville);
		$ajout->bindValue(':mdp', $mdp);
		$ajout->bindValue(':auto', $autori);
		$ajout->execute();
		return true;
	}
}

?>