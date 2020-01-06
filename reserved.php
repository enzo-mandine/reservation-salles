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
    $request = "SELECT * FROM `reservations` INNER JOIN `utilisateurs` ON utilisateurs.id = reservations.id_utilisateur WHERE reservations.id = '" . $_GET["id"] . "'";
    $resultat = sql_request($request, true, true);
    var_dump($resultat);
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
                </div>
            </div>
        </article>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>