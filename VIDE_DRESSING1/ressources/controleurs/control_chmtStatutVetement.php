<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_chmtStatutVetement.php';

class Controller_chmtStatutVetement{

	function cCode($code){
		
		$acc = new chmtStatutVetement;
		$acc->mCode($code);
		return true;
	}
}
?>