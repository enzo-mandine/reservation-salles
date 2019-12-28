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

	<body class="mp0">
		<?php include("header.php"); ?>
		
		<main>
			<div id="" class="">
				<section id="box" class="">
					<form class="flexc" action=""  method="POST">
						
						<div class="flexr input_zone">
							<label for="titre">Titre</label>
							<input class="input" type="text" name="titre" />
						</div>
						
						<div class="flexr input_zone">
							<label for="desc">Description</label>
							<textarea class="input" type="text" name="desc"  cols="30" rows="4"></textarea>
						</div>
						
						<div class="flexr input_zone">
							<label>Date</label>
							<input class="input" name="dateDebut" type="date"/>
						</div>

						<div class="flexr input_zone">
							<label>Heure</label>
							<input class="input" name="hourDebut" type="time" min="08:00" max="18:00"/>
						</div>
						
						<input class="button" type="submit" value="Enregistrer" name="submitBtn"/>
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

	if(!isset($_SESSION["isconnected"]))
	{
		header("location:connexion.php");
	}

	if(isset($_POST["submitBtn"]))
	{
		if(required($_POST))
		{
			$titre 		 =	$_POST["titre"];
			$description = 	$_POST["desc"];
			$dateDebut 	 = 	$_POST["dateDebut"]." ".$_POST["hourDebut"];
			$dateFin 	 =	$_POST["dateDebut"]." ".date("H", strtotime(strval(intval($_POST["hourDebut"])+1).":00"));
			
			$isFree = sql_request("SELECT ID FROM reservations WHERE debut = '".$dateDebut.":00'",true,true);
			
			if(empty($isFree))
			{
				sql_request("INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`)
							VALUES (NULL,'".$titre."', '".$description."', '".$dateDebut.":00',
							'".$dateFin.":00:00' , '".$_SESSION["id"]."')");
				header("location:planning.php");
			}
			else
			{
				header("location:reservation-form.php?error=3");
			}
			
		}
		else
		{
			header("location:reservation-form.php?error=4");
		}
	}
?>