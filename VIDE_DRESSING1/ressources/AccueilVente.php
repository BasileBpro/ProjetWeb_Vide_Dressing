<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" sizes="144x144" href="image.ico">
		<title>Glazik Gym</title>
		
		<?php
			include 'template/headCss.php';
		?>
	</head>
<script type="text/javascript">
	function verificationf1(f){ //fonction qui verifie si tous les champs du formulaire2 sont remplis avant de rediriger
			var NomClient = verifVide(f.NomClient);
			var PrenomClient = verifVide(f.PrenomClient);
								
			if(NomClient && PrenomClient){
				return true;
			}
			else{
				alert("Veuillez remplir correctement tous les champs");  //message d'erreur si tout n'est pas rempli
				return false;
			}
		}

		function verificationf2(f){//fonction qui verifie si tous les champs du formulaire1 sont remplis avant de rediriger
			var trigramme = verifVide(f.trigramme);								
			if(trigramme){
				return true;
			}
			else{
				alert("Veuillez remplir correctement tous les champs");
				return false;
			}
		}

		function verificationf3(f){//fonction qui verifie si tous les champs du formulaire3 sont remplis avant de rediriger
			var Acceptation = verifVide(f.Acceptation);								
			if(Acceptation){
				return true;
			}
			else{
				alert("Veuillez remplir correctement tous les champs");
				return false;
			}
		}
		function verificationf4(f){//fonction qui verifie si tous les champs du formulaire4 sont remplis avant de rediriger
			var EnVente = verifVide(f.EnVente);
								
			if(EnVente){
				return true;
			}
			else{
				alert("Veuillez remplir correctement tous les champs");
				return false;
			}
		}
		function verificationf5(f){//fonction qui verifie si tous les champs du formulaire5 sont remplis avant de rediriger
			var Retirer = verifVide(f.Retirer);
								
			if(Retirer){
				return true;
			}
			else{
				alert("Veuillez remplir correctement tous les champs");
				return false;
			}
		}


	function surligne(champ, erreur){
			if(erreur){
				champ.style.backgroundColor = "#fba"; //passe le champ en rouge quand il n'est pas rempli
			}
			else{
				champ.style.backgroundColor = "";
			}
		}
	function verifVide(champ){
			if(champ.value.length ==0){ //si rien n'est entré dans le formulaire
				surligne(champ, true); //on appelle la fonction du dessus
				return false;
			}
			else{
				surligne(champ, false);
				return true;
			}
		}


</script>
	<body>
	
	<div id="fh5co-page">
		<section id="fh5co-header">
			<div class="container">
				<nav role="navigation">
					<?php
						include 'navigation.php';
					?>
				</nav>
			</div>
		</section>
		<!-- #fh5co-header -->

		<section id="fh5co-hero" class="js-fullheight" style="background-image: url(template/images/hero_bg.jpg);" data-next="yes">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-intro js-fullheight">
					<div class="fh5co-intro-text">
						<div class="fh5co-left-position">
							<h1>Bienvenue sur la vente du vide dressing</h1>

							<i><h4>Nouveau client</h4></i>
							<form method="post" action="EnregistrementClient.php" id="f1" onsubmit="return verificationf1(this)">
								<label for="nom"> Nom : </label>
								<input id="nom" type="text" name="NomClient" onblur="verifVide(this)"> 
								<label for="prenom"> Prénom : </label>
								<input id="prenom" type="text" name="PrenomClient" onblur="verifVide(this)">
								<input type="submit" name="NewClient" value="Valider"/>
   							</form>

   							<i><h4>Edition listes articles par vendeur</h4></i>
   							<form method='post' id="f2" action="editionparvendeur.php" onsubmit="return verificationf2(this)">
   								<label for="edition du document par vendeur">Saisir trigramme vendeur</label>
   								<input type="text" id="trigramme" name="trigramme" onblur="verifVide(this)">
								<input type="submit" name="edition" value="edition">
   							</form>
   							<i><h4>Avant le début de la vente</h4></i>

   							<form method="post" id="f3" action="accepterListe.php" onsubmit="return verificationf3(this)">
   								<label for="Accepter une liste">Paiement de la liste reçu</label>
   								<input type="text" id="Acceptation" name="Acceptation" onblur="verifVide(this)">
								<input type="submit" name="edition" value="Accepter">
   							</form>
   							<form method="post" id="f4" action="ListeEnVente.php" onsubmit="return verificationf4(this)">
   								<label for="Mettre une liste en vente">passer en vente une liste ou modifier statut article</label>
   								<input type="text"  id="EnVente" name="EnVente" onblur="verifVide(this)">
								<input type="submit" name="edition" value="envente">
   							</form>
   							<form method="post" id="f5" action="retirerArticle.php" onsubmit="return verificationf5(this)">
   								<label for="Retirer article vente">Retirer article de la vente</label>
   								<input type="text" id="Retirer" name="Retirer" value="Code Article" onblur="verifVide(this)">
								<input type="submit" name="Retir" value="Retirer">
   							</form>

   							<i><h4>Fin de vente</h4></i>
   							<form method="post" action="FinVente.php">
   								<label for="fin de vente">Fin de Vente</label>
								<input type="submit" name="fin" value="Cloturer">
   							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-learn-more animate-box">
				<a href="#" class="scroll-btn">
					<span class="text">En savoir plus</span>
					<span class="arrow"></span>
				</a>
			</div>
		</section>
		<!-- END #fh5co-hero -->

		<?php
			include 'template/footer.php';
		?>
	</div>
	<!-- END #fh5co-page -->
	

	
	<?php
		include 'template/javascript.php';
	?>
	

	</body>
</html>

