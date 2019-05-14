<?php
	session_start();
	// include 'connexionBD.php';
	if(isset($_POST['add']) && isset($_POST['add']) && !empty($_POST['choix'])) {
		$_SESSION['modif'] = $_POST['choix'];
	}
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


	<!-- 
		INFO:
		Add 'boxed' class to body element to make the layout as boxed style.
		Example: 
		<body class="boxed">	
	-->
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
							<form method="post" action="gestionVendeur.php">
								<?php
									include 'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_ModifVendeur.php';

									if (isset($_SESSION['modif'])) {
										$val = new Controller_ModifVendeur;
										foreach($_SESSION['modif'] as $code) {
											echo "<p>Entrez votre code pour ".$code." :</p>";
											$val->cModifVend($code);
											echo '<input type="text" name="code[]" value="$val" minlength="3" maxlength="500"/><br/>';
										}
									} 
									else {
										echo "<p>Vous n'avez pas d'animal à modifier</p>";
									}									
								?>
							<br/><input type="submit" name="update" value="Soumettre"/>
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

