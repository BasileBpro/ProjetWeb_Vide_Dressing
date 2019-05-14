<?php 
// Suppression d'un vêtement.
	include 'connexion.php';
	include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_SupprimerVetement.php';

	$code = $_POST['code'];
	
	if(isset($code)){
		$Suppr = new Controller_SupprimerVetement;
		$Suppr->cSupprVetement($code);
	}
	else {
		echo "<script> alert('Erreur Formulaire'); </script> ";
		header("Location:Fiche_vente.html");
		mysql_close();
	}

?> 

