<?php 
// Suppression d'une liste

	include 'connexion.php';
	include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_SupprimerListe.php';

	$nomListe = $_POST['liste'];

	if(isset(($nomListe))){
		
		$suppr = new Controller_SupprimerListe;
		$suppr->cSupprListe($nomListe);
		header('Location:ficheVente.php');
	}

	else {
		header("Location:ficheVente.php");
		echo "<script> alert('formulaire invalide'); </script> ";
		mysql_close();
	}
?> 