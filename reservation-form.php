<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Caveat|Open+Sans|Roboto&display=swap" rel="stylesheet">
	<title>Reservation</title>
</head>

<body class="mp0">
	<?php include("header.php");
	
		$row=$_GET["row"];
		$col = $_GET["col"];
		$curTime = $_GET["curTime"];
		
		$selected_date = date("Y-m-d", strtotime("+ ".($col-1)." days", $curTime));
		if($row < 10) {
			$row = "0".$row;
			$selected_hour = $row.":00";			
		}
		else
		{
			$selected_hour = $row.":00";			
		}
	?>

	<main>
		<div id="box">
			<form action="" method="POST">
				<div class="flexr">
					<div>
						<label for="titre">Titre de l'évenement</label>
						<br>
						<input class="input mb15" type="text" name="titre" placeholder="Mon évènement" required>
						<br>
						<label for="dateDebut">Date</label>
						<br>
						<input class="input mb15" type="date" name="dateDebut" value="<?php echo $selected_date; ?>">
						<br>
						<label for="hourDebut">Heure</label>
						<br>
						<input class="input mb15" type="time" min="08:00" max="18:00" name="hourDebut" value="<?php echo $selected_hour; ?>">
					</div>
					<div id="png_calendar"></div>
				</div>
				<br>
				<label for="desc">Description de mon évènement</label>
				<br>
				<textarea class="txt_area mb15" name="desc" placeholder="Décrivez votre évènement ici" required></textarea>
				<br>
				<input class="button gradient-border flexr center" name="submitBtn" type="submit" value="Reserver">

			</form>
		</div>
	</main>

	<?php include("footer.php"); ?>
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
				error("Un évenement est déja enregistré a cette heure", "reservation-form.php");
			}
			
		}
		else
		{
			error("Tous les champs doivent être remplis", "reservation-form.php");
		}
	}
?>