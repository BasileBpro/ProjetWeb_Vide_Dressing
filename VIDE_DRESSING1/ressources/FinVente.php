
<?php 

// include 'connexionBD.php'; //fichier de connexion à la base de données
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_FinVente.php';

$recap = new Controller_FinVente;
$recap->cVente();
header("Location: AccueilVente.php");

 ?>