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

	<body class="mp0">
		<?php 
			include("header.php");     
			if(isset($_GET["profil"])) {
				error("Changement effectués");
			}
	?>
			
		
		<main>
			<div id="" class="">
				<section id="" class="">
					<p id="" class="">Profil de <?php echo $_SESSION["login"]; ?></p>
					<form class="" action="" method="POST" enctype="multipart/form-data">
						
						<div class="inputZone">
							<label for="profilePic">Photo profil</label>
							<input type="file" name="profilPic" value=""/>
						</div>
						
						<label for="login">Login</label>
						<input class="" type="text" name="login" value="<?php echo $_SESSION["login"]; ?>" required>
						
						<label for="password">Password</label>
						<input class="" type="password" name="password" required>
						
						<label for="passwordconfirm">Confirmez le password</label>
						<input class="" type="password" name="passwordconfirm"  required>
						
						<label for="Npassword">Nouveau mot de passe</label>
						<input class="" type="password" name="Npassword" >
						
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
			if(strlen($_FILES["profilPic"]["name"]) != 0)
			{
				$imgPath = "ProfilPics/".basename($_FILES["profilPic"]["name"]);
				$imgType = strtolower(pathinfo($imgPath,PATHINFO_EXTENSION));
				$newName = "ProfilPics/".$_SESSION["id"].".".$imgType;
				
				if(file_exists($newName))
				{
					unlink($newName);
				}
				
				move_uploaded_file($_FILES["profilPic"]["tmp_name"], $imgPath);
				rename($imgPath,$newName);
				
				sql_request("UPDATE utilisateurs SET image ='".$newName."' WHERE id =".$_SESSION["id"]);
			}
			$res = sql_request("SELECT login, password FROM utilisateurs WHERE id = '".$_SESSION["id"]."'",true,true);
			
			if(password_verify($_POST["password"], $res[1]))
			{
				if($_POST["login"] != $res[0])
				{
					$res = sql_request("SELECT login FROM utilisateurs WHERE login = '".$_POST["login"]."'", true, true);
					
					if(empty($res[0]))
					{
						sql_request("UPDATE utilisateurs SET login = '".$_POST["login"]."' WHERE id = '".$_SESSION["id"]."'");
						$_SESSION["login"] = $_POST["login"];
					}
					else
					{
						header("location:profil.php?error=5");
					}
				}

				if(!empty($_POST["Npassword"]))
				{
					sql_request("UPDATE utilisateurs SET password = '".password_hash($_POST["Npassword"],PASSWORD_BCRYPT)."'
								 WHERE id = '".$_SESSION["id"]."'");
				}
				
				header("location:profil.php?profil=true");
			}
			else
			{
				header("location:profil.php?error=2");
			}
		}
		else
		{
			header("location:profil.php?error=7");
		}
	}
?>