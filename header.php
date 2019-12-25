<?php   
	session_start();
	include("function.php");
	
	if (isset($_GET["logout"])) {
		session_destroy();
		header("location:index.php");
	}
	
	if(isset($_SESSION["block"]))
	{
		if(time() - $_SESSION["block"] > 60)
		{
			unset($_SESSION["block"]);
			header("location:index.php");
		}	?>
		
		<div id="greyScreen">
			<p id="err">Vous etes bloqué pour 60 secondes</p>
		</div>
		
<?php
	}	
	if(isset($_GET["error"])){
		if($_GET["error"] == 0) {
			error("Vous n'etes pas connecté");
		}
		if($_GET["error"] == 1) {
			error("Vous etes déja connecté");
		}
		if($_GET["error"] == 2) {
			error("Mauvais mot de passe ou login");
		}
		if($_GET["error"] == 3) {
			error("Un évenement est déja enregistré a cette heure");
		}
		if($_GET["error"] == 4) {
			error("Tous les champs doivent etres remplis");
		}
	}
	
	
	?>

<header>
	<nav class="flexr">
		<ul class="ul_style_none flexr mp0">
			<li> <a href="index.php">Accueil</a></li>
			<li> <a href="">Reservation</a></li>
			<li><a href="reservation-form.php">reservation-form</a></li>
			
<?php		if (!isset($_SESSION["isconnected"])) { ?>
				<li class="">
					<a class='' href='inscription.php'>Inscription</a>
				</li>
				
				<li>
					<a class='' href='connexion.php'>Connexion</a>
				</li>
				
	<?php			} else { ?>
				<li>
					<a class='' href='index.php?logout=true'>Deconnexion</a>
				</li>
				
				<li>
					<a class='' href='profil.php'>Mon compte</a>
				</li>

				<li>
					<a class='' href='planning.php'>Planning</a>
				</li>
<?php		}?>
			
			
		</ul>
	</nav>
</header>