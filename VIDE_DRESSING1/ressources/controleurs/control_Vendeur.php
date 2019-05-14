<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_Vendeur.php';

class Controller_Vendeur{

	function cVend($code){
	
		$acc = new Vendeur;
		$acc->mVend($code);
		return true;
	}
}
?>