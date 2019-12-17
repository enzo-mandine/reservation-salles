<?php
	if (isset($_POST["isconnected"])) {
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
	<main>
		<?php
			include("header.php");
		?>
		<div id="box" class="">
			<section id="" class="">
				<p id="" class="txt_center">Connectez-vous !! :-D</p>
				<form class="flexc" action="" method="POST">
					<label for="login">Login</label>
					<input class="mb15 input" type="text" name="login" placeholder="Login" required>
					<label for="password">Password</label>
					<input class="mb15 input" type="password" name="password" placeholder="******" required>
					<input class="button gradient-border" name="submit" type="submit" value="connexion">
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
		$res = sql_request("SELECT login, password, id FROM utilisateurs WHERE login ='" . htmlspecialchars($_POST["login"]) . "'", true, true);
		if (password_verify($_POST["password"], $res[1])) {
			$_SESSION["login"] = $_POST["login"];
			$_SESSION["id"] = $res[2];
			$_SESSION["isconnected"] = true;

			header("location:index.php");
		} else {
			header("location:connexion.php?error=0");
		}
	}

	if (isset($_GET["error"])) 
	{
		if ($_GET["error"] == 0) 
		{
			if (!isset($_SESSION["try"])) 
			{
				$_SESSION["try"] = 3;
			}
			else if($_SESSION["try"] > 0)
			{
				$_SESSION["try"] -= 1;

				if ($_SESSION["try"] <= 0) 
				{
					$_SESSION["block"] = time();
					unset($_SESSION["try"]);
					header("location:connexion.php");
				} ?>
				
				<div id="greyScreen">
				<p id="err">Mot de passe ou login incorrect <a href="connexion.php"><img src="Images/closeBtn.png" /></a><br />
					<?php echo $_SESSION["try"]; ?> essais restant.</p>
				</div>
<?php		}
			
		}
	} 
?>