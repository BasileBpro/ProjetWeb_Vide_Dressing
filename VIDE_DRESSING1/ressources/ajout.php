
<?php
	include 'connexionBD.php';
	include 'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_Ajout.php';

	echo'<script>alert("ajoute.phppppp");</script>';

	
	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['adresse']) && isset($_POST['codepostal']) && isset($_POST['ville']) && isset($_POST['mdp']) && isset($_POST['cmdp'])){
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$adresse = $_POST['adresse'];
		$codepostal = $_POST['codepostal'];
		$ville = $_POST['ville'];
		$mdp = $_POST['mdp'];
		$cmdp = $_POST['cmdp'];
		$autorisation = 0;
		$pdoEmail = new Controller_Ajout;
		$pdoEmail->cAjout($email);

		$resultemail = $pdoEmail;

		if($resultemail == false){
			//Si l'adresse mail est déjà dans la base de donnée rediriger vers la page d'inscription	
			echo '<script language="javascript">';
			echo 'alert("Cette adresse mail est déjà utilisée.");';
			echo 'window.location.replace("inscription.php");';
			echo '</script>';
			exit();
		}
		else{
			//Sinon, on créer un nouvel utilsateur
			$code = substr($prenom, 0, 1).substr($nom, 0, 2);
			$code = strtolower($code);
			
			$pdoCode = new Controller_Ajout;
			$pdoCode->cVerifTri($code);

			$resultcode = $pdoEmail;

			$codeinitial = $code;
			$codeinitial2 = $code;
			$codeinitial3 = $code;
			while($resultcode == false){
				echo "cherche nv code";
				echo "<br/>";
				$nouvelleLettre = substr($code, 0, 1);
				$ascii = ord($nouvelleLettre) + 1;
				if($ascii > 122){
					$ascii = 97;
				}
				$nouvelleLettre = chr($ascii);
				$nouveauCode = $nouvelleLettre.substr($code, 1, 2);
				
				if(strcasecmp($nouveauCode, $codeinitial) == 0){
					echo 'EGAL !!!!';
					$nouvelleLettre = substr($codeinitial, 1, 1);
					$ascii = ord($nouvelleLettre) + 1;
					if($ascii > 122){
						$ascii = 97;
					}
					$nouvelleLettre = chr($ascii);
					$nouveauCode = substr($codeinitial, 0, 1).$nouvelleLettre.substr($code, 2, 1);

					if(strcasecmp($nouveauCode, $codeinitial2) == 0){
						echo 'EGAL 22222 !';
						$nouvelleLettre = substr($codeinitial2, 2, 1);
						$ascii = ord($nouvelleLettre) + 1;
						if($ascii > 122){
							$ascii = 97;
						}
						$nouvelleLettre = chr($ascii);
						$nouveauCode = substr($codeinitial2, 0, 2).$nouvelleLettre;
						$codeinitial2 = $nouveauCode;

						if(strcasecmp($nouveauCode, $codeinitial3)){
							echo '<script language="javascript">';
							echo 'alert("Impossible de créer un nouveau compte, tous les codes utilisateurs ont été distribués. Veuillez contacter l\'administrateur du site.");';
							echo 'window.location.replace("index.html");';
							echo '</script>';
							exit();
						}
					}

					$codeinitial = $nouveauCode;
				}
				$code = $nouveauCode;
				$pdocode->cVerifTri($code);
				$resultcode = $pdoCode;
			}
			if(isset($_POST['autor'])){
				$autorisation = $_POST['autor'];
			}
			$pdoAjout = new Controller_Ajout;
			$pdoAjout->cAjoutComplet($code, $nom, $prenom, $email, $tel, $adresse, $codepostal, $ville, $mdp, $autorisation);

			$mail = $email; // Déclaration de l'adresse de destination.
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
			{
				$passage_ligne = "\r\n";
			}
			else
			{
				$passage_ligne = "\n";
			}
			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = "Vous êtes bien inscrit sur notre site !";
			$message_html = "<html><head></head><body><b>Vous êtes bien inscrit sur notre site !</b></body></html>";
			//==========
			 
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = "Glazik Gym";
			//=========
			 
			//=====Création du header de l'e-mail.
			$header = "From: \"Glazik Gym\"<camille.thirel@etudiant.univ-rennes1.fr>".$passage_ligne;
			$header.= "Reply-to: \"Glazik Gym\" <camille.thirel@etudiant.univ-rennes1.fr>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========
			 
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format HTML
			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			//==========
			 
			//=====Envoi de l'e-mail.
			//mail($mail,$sujet,$message,$header);
			//==========
			


			include 'login.php';
		}
	}
	else{
		//sinon rediriger vers la page d'inscription	
			echo '<script language="javascript">';
			echo 'alert("Formulaire invalide.");';
			//echo 'window.location.replace("inscription.php");';
			echo '</script>';
			exit();
	}
			
?>