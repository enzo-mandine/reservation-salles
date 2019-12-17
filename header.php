<?php
	include("function.php");
	
	session_start();

	if (isset($_GET["logout"])) 
	{
		session_destroy();
		header("location:index.php");
	}

	if (isset($_SESSION["block"])) 
	{
		if (time() - $_SESSION["block"] > 60) 
		{
			unset($_SESSION["block"]);
			header("location:index.php");
		}	?>

		<div id="greyScreen">
			<p id="err">Vous etes bloqué pour 60 secondes (<?php echo time()-$_SESSION["block"]; ?>)</p>
		</div>

<?php
	}	
	if(isset($_GET["error"]))
	{
		if($_GET["error"] == 1)
		{?>
			<div id="greyScreen">
			<p id="err">Vous etes déja connecté.</p>
		</div>
<?php	}
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
				if (isset($_SESSION["isconnected"])) 
				{ ?>
					<li>
						<a class='' href='index.php?logout=true'>Deconnexion</a>
					</li>
					<li>
						<a class='' href='profil.php'>Mon compte</a>
					</li>
		<?php 	} 
				else 
				{ ?>
					<li class="">
						<a class='' href='inscription.php'>Inscription</a>
					</li>
					<li>
						<a class='' href='connexion.php'>Connexion</a>
					</li>
		<?php 	} ?>
		</ul>
	</nav>
</header>