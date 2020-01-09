<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<title>Accueil</title>
</head>

<body class="mp0">

	<?php include("header.php"); ?>
	<main>
		<div id="alignindex">
			<article id="intro">
				<p>Bienvenu sur le site de réservation des salles vidéo/audio de La Plateforme_ !<br /> Pour <a href="planning.php">réserver</a> vous devez vous <a href="inscription.php"> inscrire</a>.<br />Vous réservez des créneaux d'une heure de 8h a 18h du lundi au vendredi</p>
			</article>
			<a href=<?php if (isset($_SESSION["isconnected"])) {
						echo "planning.php";
					} else {
						echo "connexion.php";
					} ?>>
				<div class="mt15">
					<input type="submit" class="button gradient-border flexc center" value="Continuer"></input>
				</div>
			</a>
		</div>
	</main>
	<?php include("footer.php"); ?>
</body>

</html>