<?php
session_start();

include 'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_AjouterListe.php';
	
	$prix = $_POST['prix'];
	$taille = $_POST['taille'];
	if (isset($prix) && isset($taille)){
	$idVetement = 0;
 	$idListe = 0;
	$trigramme = $_SESSION['Code'];
	
	$codeArticle = rand(100,1000);				
	$description = $_POST['description'];			
	$nomListe = "vetement";		
	$a = 0;

	$tailleListe = new Controller_AjouterListe;
	$tailleListe->cTailleListe($codeArticle, $description, $taille, $prix, $trigramme);	
	header("Location:ficheVente.php");
	}
	else {
		echo "<script> alert('formulaire invalide'); </script> ";
		header("Location:ficheVente.php");
		mysql_close();
	}
?>