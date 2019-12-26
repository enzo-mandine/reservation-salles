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
				<article id="intro">
					<h1>LaPlatefrome_ réservation Salle audio/vidéo</h1>
					<p>Pour pouvoir réserver, <a href="connexion.php">connectez-vous</a> ou <a href="inscritpion.php">inscrivez-vous</a>. </p>
				</article>
			<?php } else {  ?>
				<article id="intro">
					<h1>Comment réserver ?</h1>
					<p>Regardez les <a href="planning.php">réservations</a> pour y inscrire la votre.</p>
					<p>Vous pouvez aussi modifier votre <a href="profil.php">profil</a>.</p>
				</article>
			
			<?php  } ?>

			
		</main>
		
		<?php include("footer.php"); ?>
	</body>	
</html>