<?php

include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_Ajout.php';

class Controller_Ajout{

	function cAjout($email){
		$pdoEmail = new Ajout;
		$pdoEmail->mAjout($email);
		echo 'alert($email);';
		return $pdoEmail;
	}

	function cVerifTri($code){
		$pdoEmail = new Ajout;
		$pdoEmail->mVerifTri($code);
		return $pdoEmail;
	}

	function cAjoutComplet($code, $nom, $prenom, $email, $tel, $adresse, $codepostal, $ville, $mdp, $autor){
		$pdoEmail = new Ajout;
		$pdoEmail->mAjoutComplet($code, $nom, $prenom, $email, $tel, $adresse, $codepostal, $ville, $mdp, $autor);
		return true;
	}
}
?>