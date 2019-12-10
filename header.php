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
		<ul class="ul_style_none flexr ">
			<li class=""> <a href="">Accueil</a></li>
			<li class=""> <a href="">Reservation</a></li>
			<li><a href=""><!--INSERT RESERVATION-FORM.PHP HERE--></a></li>
			
<?php 			if (!isset($_SESSION["isconnected"])) { ?>
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
<?php			}?>
			
			
		</ul>
	</nav>
</header>