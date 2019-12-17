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
		<article id="intro">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, a inventore optio officiis qui quod perferendis provident temporibus iure libero, vero sit distinctio aliquid consequuntur nisi quis eaque, laborum veniam? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit quibusdam illo placeat tenetur esse magni id sunt eos, perspiciatis nihil. Minus doloremque nisi dolores eum autem dolorem maiores quos laborum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas esse modi quo quasi praesentium laudantium odit rem, culpa quidem deserunt ratione explicabo blanditiis. Odit illo earum nesciunt autem. Eveniet, dolorum.</article>
		<a href=<?php if (isset($_SESSION["isconnected"])) {
					echo "planning.php";
				} else {
					echo "connexion.php";
				} ?>>
			<article id="box" class="flexc gradient-border">
				<p class="txt_center font15pt">Bienvenue sur le site de reservation de la salle vidéo</p>
			</article>
		</a>
	</main>

	<footer>
		<div id="" class="">
			<p class="">Réservations de salles - Laplateforme</p>
		</div>
	</footer>
</body>

</html>