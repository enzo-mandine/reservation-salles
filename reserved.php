<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserved</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="mp0">
    <?php include("header.php"); ?>
    <?php
    //$request = "SELECT * FROM reservations WHERE id = '" . $_GET["id"] . "'";
    $request = "SELECT * FROM `reservations`
				INNER JOIN `utilisateurs` ON utilisateurs.id = reservations.id_utilisateur 
				WHERE reservations.id = '" . $_GET["id"] . "'";
    $resultat = sql_request($request, true, true);
    ?>
    <main>
        <article id="box">
            <div class="flexr">
                <div id="png_calendar"></div>
                <div>
                    <p class="txt_center max_width font15pt">Réserver par: <?php echo $resultat[7] ?></p>
                    <p class="txt_center max_width font15pt">Titre: <?php echo $resultat[1] ?></p>
                    <p class="txt_center max_width font15pt">Début: <?php echo $resultat[3] ?> / Fin: <?php echo $resultat[4] ?></p>
                    <p class="txt_center max_width font15pt">Description:</p>
                    <p class="txt_center max_width font15pt"><?php echo $resultat[2] ?></p>
					
					<?php
						if(isset($_SESSION["id"])) {
							if($_SESSION["id"] == $resultat[5]) {
								?>
									<div class="fixpics">
										<a href="reserved.php?id=<?php echo $resultat[0]; ?>&&deleted=true" class="mr15"><input type="button" class="res_slot mr15" value="Supprimer"/></a>
										<a href="reserved.php?id=<?php echo $resultat[0]; ?>&&modified=true" class="mr15"><input type="button" class="res_slot mr15" value="Modifier"/></a>
									</div>
								<?php
							}
						}
					?>
                </div>
            </div>
        </article>
    </main>
	
	<?php
	
		if(isset($_GET["deleted"])) {
			if($_SESSION["id"] == $resultat[5]) {
				sql_request("DELETE FROM reservations WHERE reservations.id = '".$resultat[0]."' ");
				error("L'évenement ".$resultat[1]." est supprimé","planning.php");
			}
		}
		
		if(isset($_GET["modified"])) {
			if($_SESSION["id"] == $resultat[5]) {	?>
					<div id="greyScreen">
						<form action="" method="POST" id="err">
							<a href="reserved.php?id=<?php echo $resultat[0] ?>"><img src="Images/closeBtn.png"/></a>
							<label for="titre">Titre de l'évenement</label>
							<input class="input" type="text" name="titre" value="<?php echo $resultat[1]; ?>" required>
							<label for="desc">Description de mon évènement</label>
							<textarea class="txt_area" name="desc" placeholder="Décrivez votre évènement ici" required><?php echo $resultat[2] ?></textarea>
							<input class="button gradient-border flexr center" name="submitBtn" type="submit" value="Modifier">
						</form>
					</div>
				
				<?php
				
				if(isset($_POST["submitBtn"])) {
					if($_POST["titre"] != $resultat[1]) {
						sql_request("UPDATE reservations SET titre = '".$_POST["titre"]."' WHERE id = '".$resultat[0]."' ");
					}
					if($_POST["desc"] != $resultat[2]) {
						sql_request("UPDATE reservations SET description = '".$_POST["desc"]."' WHERE id = '".$resultat[0]."' ");
					}
					header("location:reserved.php?id=".$resultat[0]);
				}
			}
		}
	?>
	
    <?php include("footer.php"); ?>

</body>

</html>

