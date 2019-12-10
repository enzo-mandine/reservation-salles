

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
					<p id="" class="">Veuillez vous enregistrer pour consulter et/ou rédigez sur le live d'or
					</p>
					<form class="" action="inscription.php" method="POST">
						<label for="login">Login</label>
						<input class="" type="text" name="login" placeholder="Login" required>
						<label for="password">Password</label>
						<input class="" type="password" name="password" placeholder="******" required>
						<label for="passwordconfirm">Confirmez le password</label>
						<input class="" type="password" name="passwordconfirm" placeholder="******" required>
						<input id="" class="" name="submit" type="submit" value="connexion">
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
	if (isset($_POST["submit"])) {
		if ($_POST["password"] == $_POST["passwordconfirm"]) {
			$result = sql_request("SELECT * FROM `utilisateurs` WHERE login = '".$_POST["login"]."'", true);
			if(empty($result[0]))
			{
				sql_request("INSERT INTO utilisateurs (`id`, `login`, `password`) 
							 VALUES (NULL, '".htmlspecialchars($_POST["login"])."',
							 '" . password_hash($_POST["password"], PASSWORD_DEFAULT)."');");
				header("location:connexion.php");
			}
		}
	}
?>