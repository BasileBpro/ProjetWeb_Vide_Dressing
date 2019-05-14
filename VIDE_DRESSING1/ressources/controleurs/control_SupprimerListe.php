<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_SupprimerListe.php';

class Controller_SupprimerListe{

	function cSupprListe($nomListe){
		
		$acc = new model_SupprimerListe;
		$acc->mSupprListe($nomListe);
		return true;
	}
}
?>