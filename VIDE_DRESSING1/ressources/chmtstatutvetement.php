<?php 
include 'connexionBD.php'; //fichier de connexion à la base de données
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_chmtStatutVetement.php';
$code=$_POST['compte'];
$CodeClass = new Controller_chmtStatutVetement;

foreach($_POST['compte'] as $code) {
	$CodeClass->cCode($code);
}// requête sql qui passe le statut du vetement coché à "NON PRESENT"

header("Location: AccueilVente.php");// redirection


 ?>