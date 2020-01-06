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
		<article id="intro">
			<p>Bienvenu sur le mode RESERVIX 2000 des salles vidéo/audio de La Plateforme_ !<br />Vous avez un projet ?</p>
		</article>
		<a href=<?php if (isset($_SESSION["isconnected"])) {
					echo "planning.php";
				} else {
					echo "connexion.php";
				} ?>>
			<article id="box" class="flexc gradient-border">
				<p class="txt_center font15pt">Réservez sur la durée j'usqu'a 2h/jour selon vos disponibilités ! </p>
			</article>
		</a>
		
		<article class="flexcol marg-pad mid-width-height">
		
			<form class="flexrow flex_center marg-pad mid-width-height" method="post" action="">
				<input type="checkbox" class="" value="Monday" name="jour"/>
			
			</form>
		
		</article>
	</main>
	<?php include("footer.php"); ?>
</body>

</html>


<style>

	.flexcol{
		display:flex;
		flex-direction:column;
	}
	
	.flexrow{
		display:flex;
		flex-direction:row;
	}
	
	.flex_center {
		align-self:center;
	}
	
	.marg-pad{
		margin:15px;
		padding:15px;
	}
	
	.mid-width-height
	{
		width:50vh;
		height:50vh;
	}

</style>