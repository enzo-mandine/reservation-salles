<?php
	
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
						
						<label for="titre">Titre</label>
						<input type="text" name="titre" />
						
						<label for="desc">Description</label>
						<textarea type="text" name="desc"  cols="30" rows="1"></textarea>
						
						<label for="dateDebut">Début</label>
						<input name="dateDebut" type="date"/>
						<input name="hourDebut" type="time" min="08:00" max="18:00"/>
						
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

	if(!isset($_SESSION["isconnected"]))
	{
		header("location:index.php");
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
							'".$dateFin.":00' , '".$_SESSION["id"]."')");							
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