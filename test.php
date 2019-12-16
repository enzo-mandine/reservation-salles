<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="teststyle.css">
    <title>Document</title>
</head>

<body>
    <main>
        <?php

        $login = mysqli_connect("localhost", "root", "", "reservationsalles");
        //$request = "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur";
        $request = "SELECT * FROM reservations";
        $query = mysqli_query($login, $request);
        $result = mysqli_fetch_all($query);
        $y = 0;
        ?>
        <table>
            <?php
            while ($y < 12) {
            ?>
                <tr>
                    <?php
                    $x = 0;
                    while ($x < 6) {
                        //${'var' . $y . "_" . $x} = $y . "_" . $x;
                        //$yoyo =  $y . "_" . $x;
                        $i = 0;
                        $pos = $y . "_" . $x;
                        while ($i < count($result)) {
                            $yoyo = "<a href=\"reservation-form.php?location=" . $pos . "\"><input type='button' value='+'></a>";
                            //$yoyo = NULL;
                            if ($result[$i][6] == $y . "_" . $x) {
                                $yoyo = $result[$i][1] . '<br>' . $result[$i][2];
                                break ;
                            }
                            ++$i;
                        }
                        if ($x == "0" && $y == "0") {
                            $yoyo = NULL;
                        } else if ($x == "1" && $y == "0") {
                            $yoyo = "Lundi";
                        } else if ($x == "2" && $y == "0") {
                            $yoyo = "Mardi";
                        } else if ($x == "3" && $y == "0") {
                            $yoyo = "Mercredi";
                        } else if ($x == "4" && $y == "0") {
                            $yoyo = "Jeudi";
                        } else if ($x == "5" && $y == "0") {
                            $yoyo = "Vendredi";
                        } else if ($x == "0" && $y == "1") {
                            $yoyo = "8h";
                        } else if ($x == "0" && $y == "2") {
                            $yoyo = "9h";
                        } else if ($x == "0" && $y == "3") {
                            $yoyo = "10h";
                        } else if ($x == "0" && $y == "4") {
                            $yoyo = "11h";
                        } else if ($x == "0" && $y == "5") {
                            $yoyo = "12h";
                        } else if ($x == "0" && $y == "6") {
                            $yoyo = "13h";
                        } else if ($x == "0" && $y == "7") {
                            $yoyo = "14h";
                        } else if ($x == "0" && $y == "8") {
                            $yoyo = "15h";
                        } else if ($x == "0" && $y == "9") {
                            $yoyo = "16h";
                        } else if ($x == "0" && $y == "10") {
                            $yoyo = "17h";
                        } else if ($x == "0" && $y == "11") {
                            $yoyo = "18h";
                        }
                        //${'var'.$result[0][9]} = $result[0][5];
                        //$yoyo = $result[0][5];
                    ?>
                        <td>
                            <?php
                            //echo ${'var' . $y . "_" . $x};
                            echo $yoyo;
                            ?>
                        </td>
                    <?php
                            ++$x;
                        }
                        ++$y;
                    ?>
                </tr>
            <?php
                    }
            ?>
    </main>
</body>
<br>

</html>