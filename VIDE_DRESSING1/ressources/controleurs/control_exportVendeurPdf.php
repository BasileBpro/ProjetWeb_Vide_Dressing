<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_exportVendeurPdf.php';

class Controller_exportVendeurPdf{
	function cpdoVendeur(){
		$Vendeur = new exportVendeurPdf;
		$acc = $Vendeur->mpdoVendeur();
		return $acc;
	}
}
?>