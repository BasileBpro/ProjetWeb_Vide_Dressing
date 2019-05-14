<?php
	session_start();
	// include 'connexionBD.php';
	include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_Vendeur.php';

	if (isset($_POST['faireModif'])) {
		$_SESSION['modif'] = $_POST['compte'];
		header('Location: modifVendeur.php');
		exit();
	} elseif (isset($_POST['faireSupp'])) {
		$Vendeur = new Controller_Vendeur;
		foreach($_POST['compte'] as $code) {
			$Vendeur->cVend($code);
		}
		header('Location: gestionVendeur.php');
		exit();
	} elseif (isset($_POST['faireAjout'])) {
		try {
			header('Location: ajoutVendeur.php');
			exit();
		} catch (PDOException $a){
			echo 'suppression non reussie ' . $a->getMessage();
		}
	}else {
		echo 'loupé';
	}
?>
