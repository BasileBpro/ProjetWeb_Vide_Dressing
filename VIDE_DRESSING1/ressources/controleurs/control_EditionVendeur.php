<?php

include 'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_EditionVendeur.php';

class Controller_EditionVendeur{

	function cRecap($trigramme){

		$recap = new EditionVendeur;
		$result = $recap->mRecap($trigramme);
		return $result;
	}

	function cRecapAll($trigramme){
		$recap = new EditionVendeur;
		$result = $recap->mRecapAll($trigramme);
		return $result;
	}
}
?>