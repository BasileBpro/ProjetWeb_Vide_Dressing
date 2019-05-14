<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_FinVente.php';

class Controller_FinVente{

	function cVente(){
		
		$acc = new FinVente;
		$acc->mVente();
		return true;
	}
}
?>