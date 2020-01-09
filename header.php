<?php
session_start();
include("function.php");

if (isset($_GET["logout"])) {
	session_destroy();
	header("location:index.php");
}

if (isset($_SESSION["block"])) {
	if (time() - $_SESSION["block"] > 60) {
		unset($_SESSION["block"]);
		header("location:index.php");
	}	?>

	<div id="greyScreen">
		<p id="err">Vous etes bloqué pour 60 secondes</p>
	</div>

<?php
}
?>

<header>
	<nav id="nav_header" class="flexr">
		<ul id="nav_ul" class="ul_style_none flexr">
			<li class="">
				<a href="index.php">Accueil</a>
			</li>
			<li class="">
				<a href="planning.php">Reservation</a>
			</li>
			<?php
			if (isset($_SESSION["isconnected"])) { ?>
				<li>
					<a class='' href='index.php?logout=true'>Deconnexion</a>
				</li>
				<li>
					<div class="flexr">
						<a class='mr15' href='profil.php'>Mon compte</a>
						<img class="profilePicHead" src="ProfilPics/<?php avatarcheck()?>">
					</div>
				</li>
			<?php 	} else { ?>
				<li class="">
					<a class='' href='inscription.php'>Inscription</a>
				</li>
				<li>
					<a class='' href='connexion.php'>Connexion</a>
				</li>
			<?php			} ?>
		</ul>
	</nav>
</header>