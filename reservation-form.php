<?php
	if (!isset($_SESSION["login"])) {
		header("index.php?error=2");
	}

	if (isset($_GET["location"])) {
		$location = $_GET["location"];
	}
	//$sel_date= date("Y") . "-" . date("m") . "-" . date("d");
	// $sel_date = date("d-m-Y H:i");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Reservation</title>
</head>

<body class="mp0">

    <main>
        <?php include("header.php"); ?>
        <div id="box">
            <form action="" method="POST">
                <div class="flexr">
                    <div>
                        <label for="titre">Titre de l'évenement</label>
                        <br>
							<input class="input mb15" type="text" name="titre" placeholder="Mon évènement"  value="Mon évènement" required>
                        <br>
							<label for="start">Début</label>
                        <br>
							<input class="input mb15" type="datetime-local" value="20/12/2019 17:15"name="start">
                        <br>
							<label for="end">Fin</label>
                        <br>
							<input class="input mb15" type="datetime-local" value="20/12/2019 18:15" name="end">
                    </div>
                    <div id="png_calendar"></div>
                </div>
                <br>
					<label for="description">Description de mon évènement</label>
                <br>
					<textarea class="txt_area mb15" name="description" placeholder="Décrivez votre évènement ici" required></textarea>
                <br>
					<input class="button gradient-border flexr center" name="submit" type="submit" value="connexion">

            </form>
        </div>
    </main>

    <?php include("footer.php"); ?>
</body>

</html>


<?php

	if(isset($_POST["submit"])) {
		$verify = true;
		$count = 0;
		foreach($_POST as $input=>$value) {
			if(empty($value)) {
				header("reservation-form.php?error=3");
				$verify = false;
				break;
			}
			$count++;
		}
		
		if($verify) {
			
			if(!empty(sql_request("SELECT * FROM reservations WHERE date = '".date("Y/m/d H:i", strtotime($_POST["start"]))."'", true, true))."'") {
				header("location:reservation-form?error=4");
			}
			else
			{
				sql_request("INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `pos`, `id_createur`)
							VALUES (NULL,'".$_POST["titre"]."' , '".$_POST["description"]."' , '".date("Y/m/d H:i", strtotime($_POST["start"]))."'
							, '".date("Y/m/d H:i", strtotime($_POST["end"]))."' , '".$_GET["location"]."' , '".$_SESSION["id"]."')");
			}
		}	
	}





?>