<?php

	if(isset($_POST["isconnected"]))
	{
		header("index.php");
	}
	
	if(isset($_GET["row"]) && isset($_GET["column"]))
	{
		$days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi");
		$hour = $_GET["row"];
		$day = $days[$_GET["column"]-1];
	}
	
?>

<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Caveat|Open+Sans|Roboto&display=swap" rel="stylesheet">
		<title>Form</title>
	</head>

	<body>
		<?php include("header.php"); ?>
		
		<main>
			<div id="" class="">
				<section id="" class="">
					<form class="" action=""  method="POST">
						<label for="name">Votre nom</label>
						<input type="text" name="name" value = <?php echo $_SESSION["login"]; ?> />
						
						<label for="titre">Titre</label>
						<input type="text" name="titre" />
						
						<label for="desc">Description</label>
						<textarea type="text" name="desc"  cols="30" rows="1"></textarea>
						
						<label for="dateDebut">Début</label>
						<input name="dateDebut" type="date"/>
						<input name="hourDebut" type="time" min="08:00" max="18:00"/>
						
						<label for="dateFin">Fin</label>
						<input name="dateFin" type="date"/>
						<input name="hourFin" type="time" min="09:00" max="19:00"/>
						
						<input type="submit" value="Enregistrer" name="submitBtn"/>
					</form>
				</section>
			</div>
		</main>
		
		<footer>
			<div id="" class="">
				<p class="">Réservations de salles - Laplateforme</p>
			</div>
		</footer>
	</body>
</html>


<?php
	if(isset($_POST["submitBtn"]))
	{
		if(required($_POST))
		{
			$titre 		 =	$_POST["titre"];
			$description = 	$_POST["desc"];
			$dateDebut 	 = 	$_POST["dateDebut"];
			$dateFin 	 =	$_POST["dateFin"];
			$hourDebut   = 	$_POST["hourDebut"];
			$hourFin 	 =	$_POST["hourFin"];
			
			sql_request("INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`)
						VALUES (NULL,'".$titre."', '".$description."', '".$dateDebut." ".$hourDebut."' ,
						'".$dateFin." ".$hourFin."' , '".$_SESSION["id"]."')");			
		}
	}
?>


<style>
	.inputZone
	{
		display:flex;
		width:200px;
		justify-content:row
	}
	
	form
	{
		display:flex;
		flex-direction:column;
		width:300px;
	}
</style>