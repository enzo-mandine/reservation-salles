<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="style.css">
		<title>Accueil</title>
	</head>

	<body class="mp0">
		<?php include("header.php"); ?>
		
		<main>
			<?php if(!isset($_SESSION["isconnected"])) { ?>
				<article>
					<h1>LaPlatefrome_ réservation Salle audio/vidéo</h1>
					<p>Pour pouvoir réserver, <a href="connexion.php">connectez-vous</a> ou <a href="inscritpion.php">inscrivez-vous</a>. </p>
				</article>
			<?php } else {  ?>
			
			<?php  } ?>

			<article>
				<h1>Commemt réserver ?</h1>
				<p>Apres vous etre créer un compte, conectez vous puis rendez vous sur <a href="reservation-form.php">réservation</a> pour y inscrire votre réservation</p>
			</article>
			
		</main>
		
		<footer>
			<div id="" class="">
				<p class="">Réservations de salles - Laplateforme</p>
			</div>
		</footer>
	</body>	
</html>