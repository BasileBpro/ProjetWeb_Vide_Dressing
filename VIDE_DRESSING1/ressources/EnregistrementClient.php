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


		<script type="text/javascript">
			var ticket=[];
			function getHU() { 
				var hu = document.getElementById("hu").value;  //récupère le code article fourni
				ticket.push(hu); //rajoute cet article à la fin du tableau
				document.getElementById("hu").value=""; //vide la zone de texte
			}

			function afficher(){
				alert(ticket);
			}

			function redirection(){
				if(ticket.length==0){
					alert("Vous n'avez pas entré de valeur");//si aucune valeur n'est entrée, on ne redirige pas
				}
				else{
					var result="";
				for (var i = 0; i < ticket.length; i++){
					result+=ticket[i]+";"; //on ajoute à la String les données du tableau
				}
				var lien="ticket.php?liste=";
				lien+=result; //le lien est construit avec les données du tableau et le nom du fichier
				alert(lien);
				document.location.href=lien;
				}
				
			}
   		</script> 
	</head>


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
						<!-- 
							INFO:
							Change the class to 'fh5co-right-position' or 'fh5co-center-position' to change the layout position
							Example:
							<div class="fh5co-right-position">
						-->
						<div class="fh5co-left-position">
							<?php 
								$nom = strtoupper($_POST['NomClient']);
								$prenom = strtolower($_POST['PrenomClient']);
								$prenom = ucfirst($prenom);
								echo ("<h3> Client : ".$nom." ".$prenom."</h3>");
							?>
							<FORM>
						 		<input type="text" name="numero" id="hu" value="numero" />
						 		<input type="button" value="Ajouter vetement" onclick="getHU();" />
							</FORM>

							<form  method="POST" action="ticket.php">
								<input type="button" name="valid" value="Dernier achat" onclick="redirection();">
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

