<?php
include 'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_AccepterListe.php';

class Controller_AccepterListe{

	function cAccepterListe(){
		
		$acc = new AcceptListe;
		$acc->mAccepterListe();
		return true;
	}
}
?>