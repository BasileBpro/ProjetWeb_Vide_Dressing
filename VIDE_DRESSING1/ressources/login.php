<?php
//demarrer la session
session_start();
// connexion a la bdd
include 'connexionBD.php';
include 'controleurs/C_Login.php';
	$Email = new CLoginMail;
	$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
	if(isset($_POST['email']) && isset($_POST['mdp'])){
		
		$email = $_POST['email'];
		$mdp = $_POST['mdp'];

		
		$result = $Email->cMail($email, $mdp);


		if($result == 1){
			echo "connexion";
			$_SESSION['connecte'] = "oui";
			$_SESSION['email'] = $email;
			
			$resultautorisation = $Email->cAutorisation($email);
			
			$test = $Email->cRecupTrigramme($email);
			$var = $test[0]['Code'];
			$_SESSION['Code'] = $var;
			$var2 = $Email->cRecupId($var);
			$var2 = $var2[0]['idLISTE'];
			$_SESSION['Code'] = $var2;
			if($resultautorisation == 1){
				
				$_SESSION['autorisation'] = "oui";

			}

			header('Location: accueil.php');
			exit();
		}
		else{
			//sinon rediriger vers la page de connexion		
			echo '<script language="javascript">';
			echo 'alert("erreur de connexion!");';
			echo 'window.location.replace("connexion.php");';
			echo '</script>';
			exit();
		}
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Formulaire invalide!");';
		echo 'window.location.replace("connexion.php");';
		echo '</script>';
		exit();
	}

?>

