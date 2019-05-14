<?php
include('C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\M_Login.php');

class CLoginMail{

	function cMail($email, $mdp){
		$Email = new MLoginMail;
		$test = $Email->mMail($email, $mdp);
		return $test;
	}

	function cAutorisation($email){
		$EmailAuto = new MLoginMail;
		$test = $EmailAuto->mAutorisation($email);
		return $test;
	}
	function cRecupTrigramme($email){
		$Tri = new MLoginMail;
		$test = $Tri->mRecupTrigramme($email);
		return $test;
	}
	function cRecupId($tri){
		$Tri = new MLoginMail;
		$test = $Tri->mRecupId($tri);
		return $test;
	}
}
?>