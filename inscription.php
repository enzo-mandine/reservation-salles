<!DOCTYPE html>
<?php

if (isset($_POST["login"])) {
	header("index.php?error=1");
}

?>

<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Caveat|Open+Sans|Roboto&display=swap" rel="stylesheet">
	<title>Inscription</title>
</head>

<body class="mp0">
	<?php include("header.php"); ?>

	<main>
		<div id="" class="">
			<section id="box" class="">
				<p id="" class="">Veuillez vous enregistrer pour reserver.</p>
				<form class="flexc" action="inscription.php" method="POST">

					<label for="login">Login</label>
					<input class="mb15 input" type="text" name="login" placeholder="Login" required>
					<label for="password">Password</label>
					<input class="mb15 input" type="password" name="password" placeholder="******" required>
					<label for="passwordconfirm">Confirmez le password</label>
					<input class="mb15 input" type="password" name="passwordconfirm" placeholder="******" required>
					<input id="" class="button gradient-border" name="submit" type="submit" value="Valider">
				</form>
			</section>
		</div>
	</main>

	<?php include("footer.php"); ?>
</body>

</html>

<?php

if (isset($_POST["submit"])) {
	if(required($_POST)) {
		if ($_POST["password"] == $_POST["passwordconfirm"]) {
			$result = sql_request("SELECT * FROM `utilisateurs` WHERE login = '" . $_POST["login"] . "'", true);
			if (empty($result[0])) {
				sql_request("INSERT INTO utilisateurs (`id`, `login`, `password`, `image`) 
								 VALUES (NULL, '" . htmlspecialchars($_POST["login"]) . "',
								 '" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "', '".htmlspecialchars("0.png")."');");
				header("location:connexion.php");
			}
			else
			{
				error("Login déja pris", "inscription.php");
			}
		}
		else
		{
			error("Les mots de passes ne correspondent pas", "inscription.php");
		}
	}
	else
	{
		error("Tous les champs doivent être remplis", "inscription.php");
	}
}
?>