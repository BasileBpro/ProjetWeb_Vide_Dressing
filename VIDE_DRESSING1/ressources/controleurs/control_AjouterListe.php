<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_AjouterListe.php';

class Controller_AjouterListe{

	function cTailleListe($codeArticle, $description, $taille, $prix, $idListe){
		$TailleListe = new AjouterListe;
		
		$TailleListe->mAjouterVetement($codeArticle, $description, $taille, $prix, $idListe);
		return true;
	}
	
}
?>