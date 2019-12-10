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
					<p id="" class="">Profil de <?php echo $_SESSION["login"]; ?></p>
					<form class="" action="" method="POST">
						<label for="login">Login</label>
						<input class="" type="text" name="login" value="<?php echo $_SESSION["login"]; ?>" required>
						<label for="password">Password</label>
						<input class="" type="password" name="password" required>
						<label for="passwordconfirm">Confirmez le password</label>
						<input class="" type="password" name="passwordconfirm" placeholder="******" required>
						<input id="" class="" name="submit" type="submit" value="inscription">
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
		if($_POST["password"] == $_POST["passwordconfirm"])
		{
			$res = sql_request("SELECT login, password FROM utilisateurs WHERE id = '".$_SESSION["id"]."'",true,true);
			var_dump($res);
		}
	}
	



?>