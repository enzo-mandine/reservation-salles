<?php
	if(isset($_POST["isconnected"]))
	{
		header("index.php");
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
		<title>Inscription</title>
	</head>

	<body>
		<?php include("header.php"); ?>
		
		<main>
			<div id="" class="">
				<section id="" class="">
					<p id="" class="">Page de connexion</p>
					<form class="" action="" method="POST">
						<label for="login">Login</label>
						<input class="" type="text" name="login" placeholder="Login" required>
						<label for="password">Password</label>
						<input type="password" name="password" required>
						<input name="submit" type="submit" value="connexion">
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
	if(isset($_POST["submit"]))
	{
		$res = sql_request("SELECT login, password, id FROM utilisateurs WHERE login ='".htmlspecialchars($_POST["login"])."'",true,true);
		if(password_verify($_POST["password"], $res[1]))
		{
			$_SESSION["login"] = $_POST["login"];
			$_SESSION["id"] = $res[2];
			$_SESSION["isconnected"] = true;
			
			header("location:index.php");
		}
		
	}
?>