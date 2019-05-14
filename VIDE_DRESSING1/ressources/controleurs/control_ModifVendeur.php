<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_ModifVendeur.php';

class Controller_ModifVendeur{

	function cModifVend($code){
		
		$val = new ModifVendeur;
		$result = $val->mModifVend($code);
		return $result;
	}
}
?>