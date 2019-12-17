<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>

<body class="mp0">

    <main>
        <?php include("header.php"); ?>
        <div id="box">
            <form action="" method="POST">
                <label for="titre">Titre de l'évenement</label>
                <br>
                <input class="input mb15" type="text" name="titre" placeholder="Mon évènement">
                <br>
                <label for="start">Début</label>
                <br>
                <input class="input mb15" type="date" name="start">
                <br>
                <label for="end">Fin</label>
                <br>
                <input class="input mb15" type="date" name="end">
                <br>
                <label for="description">Description de mon évènement</label>
                <br>
                <textarea class="txt_area mb15" name="description" placeholder="Décrivez votre évènement ici"></textarea>
            </form>
        </div>
    </main>

    <footer>
        <div id="" class="">
            <p class="">Réservations de salles - Laplateforme</p>
        </div>
    </footer>
</body>

</html>