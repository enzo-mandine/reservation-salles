<?php   
	include("function.php");
	
	if (isset($_GET["logout"])) {
		session_destroy();
	}
?>

<header>
	<nav class="flexr">
		<ul class="ul_style_none flexr mp0">
			<li class=""> <a href="">Accueil</a></li>
			<li class=""> <a href="">Reservation</a></li>
			<li><a href=""><!--INSERT RESERVATION-FORM.PHP HERE--></a></li>
			
			<li class="">
				<?php if (isset($_SESSION["isconnected"])) { // Variable de session pour check la connexion de l'utilisateur ($_SESSION["isconnected"] == $_POST["login"])
					echo "<a class='' href='<!--INSERT PROFIL.PHP HERE-->'>Mon compte</a>";
				} else {
					echo "<a class='' href='<!--INSERT CONNEXION.PHP HERE-->'>Connexion</a>";
				}
				?>
			</li>
			
			<li>
				<?php if (isset($_SESSION["isconnected"])) {
					echo "<a class='' href='<!--INSERT INDEX.PHP HERE-->?logout=true'>Deconnexion</a>"; // GET pour la deconnexion (?logout=true)
				} else {
					echo "<a class='' href='inscription.php'>Inscription</a>";
				}
				?>
			</li>
			
		</ul>
	</nav>
</header>