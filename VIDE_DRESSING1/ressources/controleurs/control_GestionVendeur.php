<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_GestionVendeur.php';

class Controller_GestionVendeur{

	function cSelectListe(){
		$acc = new GestionVendeur;
		$result = $acc->mSelectListe();
		return $result;
	}
}
?>