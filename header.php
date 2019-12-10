<?php   
	session_start();
	include("function.php");
	
	if (isset($_GET["logout"])) {
		session_destroy();
		header("location:index.php");
	}
?>

<header>
	<nav class="flexr">
		<ul class="ul_style_none flexr mp0">
			<li class=""> <a href="">Accueil</a></li>
			<li class=""> <a href="">Reservation</a></li>
			<li><a href=""><!--INSERT RESERVATION-FORM.PHP HERE--></a></li>
			
			<li class="">
<?php 			if (!isset($_SESSION["isconnected"])) { ?>
					<a class='' href='inscription.php'>Inscription</a>
					<a class='' href='connexion.php'>Connexion</a>
<?php			} else { ?>
					<a class='' href='index.php?logout=true'>Deconnexion</a>
					<a class='' href='profil.php'>Mon compte</a>
<?php			}?>
			</li>
			
		</ul>
	</nav>
</header>