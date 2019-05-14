<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_SupprimerVetement.php';

class Controller_SupprimerVetement{

	function cSupprVetement($code){
		$Suppr = new SupprimerVetement;
		$Suppr->mSupprVetement($code);
		return true;
	}
}
?>