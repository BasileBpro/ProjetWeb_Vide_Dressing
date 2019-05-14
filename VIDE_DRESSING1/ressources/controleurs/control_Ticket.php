<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_Ticket.php';

class Controller_Ticket{

	function cUpdate($tableau){
		
		$acc = new Ticket;
		$resultat = $acc->mUpdate($tableau);
		return true;
	}
	function cRecup($tableau){		
		$acc = new Ticket;
		$resultat = $acc->mRecup($tableau);
		return $resultat;
	}
}
?>