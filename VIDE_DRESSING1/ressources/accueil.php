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
			include 'imageDefilante.php';
		?>

		<script language="JavaScript">

	function createInstance()
	{
        var req = null;
		if (window.XMLHttpRequest)
		{
 			req = new XMLHttpRequest();
		} 
		else if (window.ActiveXObject) 
		{
			try {
				req = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e)
			{
				try {
					req = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) 
				{
					alert("XHR not created");
				}
			}
	        }
        return req;
	};

	function storing(data, element)
	{
		element.innerHTML = data;
	}

	function submitForm(element)
	{ 
		var req =  createInstance();

		req.onreadystatechange = function()
		{ 
			if(req.readyState == 4)
			{
				if(req.status == 200)
				{
					storing(req.responseText, element);	
				}	
				else	
				{
					alert("Error: returned status code " + req.status + " " + req.statusText);
				}	
			} 
		}; 
		req.open("GET", "ajax.php", true); 
		req.send(null); 
	} 

</script>

	
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
						<div class="fh5co-right-position">
							<h2 class="animate-box">Date du prochain vide dressing</h2>
							
							<?php 
								if(isset($_SESSION['date'])){
									//echo $_SESSION['date'];
								}
								else{
									$_SESSION['date'] = 'date';
									echo $_SESSION['date'];
								}

								if(isset($_SESSION['autorisation']) && $_SESSION['autorisation'] == 'oui'){
							?>
								<input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"/>
							<?php
									$_SESSION['date'] = 'date';
								}
							?>
						</div>	
							<p> <span id="storage"> Bienvenue sur notre site </span></p>
							<hr />

							<FORM name="ajax" method="POST" action="">
								<p>
								<INPUT type="button" value="Merci"  ONCLICK="submitForm(document.getElementById('storage'))">
								</p>
							</FORM>

							<img src="" id="image1" />
							<script type="text/javascript">
								changerImage();
							</script>
							<br/>
						<div class="fh5co-left-position">					
							<p class="animate-box">
								<a href="https://vimeo.com/channels/staffpicks/93951774" class="btn btn-outline popup-vimeo btn-video">Regarder la vidéo </a> 
							</p>
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

