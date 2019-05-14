<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_ListeEnVente.php';

class Controller_ListeEnVente{

	function cUpListe($nomListe){
		$acc = new ListeEnVente;
		$acc->mUpListe($nomListe);
		return true;
	}
	function cSelectListe($liste){
		$acc = new ListeEnVente;
		$result = $acc->mSelectListe($liste);
		return $result;
	}
}
?>