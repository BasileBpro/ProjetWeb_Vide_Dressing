<?php 
	include 'connexionBD.php'; //fichier de connexion à la base de données
	include 'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_AccepterListe.php';
	$acc = new Controller_AccepterListe;
	$acc->cAccepterListe();
	header("Location: AccueilVente.php"); // redirection
?>