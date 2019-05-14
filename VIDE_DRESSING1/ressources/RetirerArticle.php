<?php 

// include 'connexionBD.php'; //fichier de connexion à la base de données
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_RetirerArticle.php';

$codeArticle=$_POST['Retirer'];
$recap = new Controller_RetirerArticle;
$recap->cUpdateArticle($codeArticle);
header("Location: AccueilVente.php"); // redirection

 ?>