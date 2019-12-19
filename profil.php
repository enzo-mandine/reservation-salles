<?php
if (isset($_POST["login"])) {
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

<body class="mp0">
	<?php
	include("header.php");
	if (isset($_GET["error"])) {
		if ($_GET["error"] == 0) { ?>

			<div id="greyScreen">
				<p id="err">Login déja pris <a href="profil.php"><img src="Images/closeBtn.png" /></a></p>
			</div>

		<?php			} else if ($_GET["error"] == 1) { ?>

			<div id="greyScreen">
				<p id="err">Le mot de passe n'est pas valide<a href="profil.php"><img src="Images/closeBtn.png" /></a></p>
			</div>

		<?php			} else if ($_GET["error"] == 2) { ?>

			<div id="greyScreen">
				<p id="err">Les mot de passes ne correspondent pas <a href="profil.php"><img src="Images/closeBtn.png" /></a></p>
			</div>

	<?php			}
	}

	?>


	<main>
		<div id="" class="">
			<section id="box" class="">
				<p id="" class="">Modifier le profil de <?php echo $_SESSION["login"]; ?></p>
				<form class="flexc" action="profil.php" method="POST">

					<label for="login">Login</label>
					<input class="mb15 input" type="text" name="login" value="<?php echo $_SESSION["login"]; ?>" required>

					<label for="password">Password</label>
					<input class="mb15 input" type="password" name="password" required>

					<label for="Npassword">Nouveau mot de passe</label>
					<input class="mb15 input" type="password" name="Npassword">

					<label for="passwordconfirm">Confirmez le mot de passe</label>
					<input class="mb15 input" type="password" name="passwordconfirm" required>

					<input id="" class="button gradient-border" name="submit" type="submit" value="Modifier">
				</form>
			</section>
		</div>
	</main>

	<?php include("footer.php"); ?>
</body>

</html>




<?php

																				if (isset($_POST["submit"])) {
																					if ($_POST["password"] == $_POST["passwordconfirm"]) {
																						$res = sql_request("SELECT login, password FROM utilisateurs WHERE id = '" . $_SESSION["id"] . "'", true, true);

																						if (password_verify($_POST["password"], $res[1])) {
																							if ($_POST["login"] != $res[0]) {
																								$res = sql_request("SELECT login FROM utilisateurs WHERE login = '" . $_POST["login"] . "'", true, true);

																								if (empty($res[0])) {
																									sql_request("UPDATE utilisateurs SET login = '" . $_POST["login"] . "' WHERE id = '" . $_SESSION["id"] . "'");
																									$_SESSION["login"] = $_POST["login"];
																								} else {
																									header("location:profil.php?error=0");
																								}
																							}

																							if (!empty($_POST["Npassword"])) {
																								sql_request("UPDATE utilisateurs SET password = '" . password_hash($_POST["Npassword"], PASSWORD_BCRYPT) . "'
								 WHERE id = '" . $_SESSION["id"] . "'");
																							}

																							header("location:profil.php?profil=true");
																						} else {
																							header("location:profil.php?error=1");
																						}
																					} else {
																						header("location:profil.php?error=2");
																					}
																				}

?>