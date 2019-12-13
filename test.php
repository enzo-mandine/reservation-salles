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
    <table>
        <thead>
            <th class="borderstylenone"></th>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
        </thead>
        <tbody>
            <tr>
                <td>8h</td>
                
            </tr>
            <tr>
                <td>9h</td>
                
            </tr>
            <tr>
                <td>10h</td>
                
            </tr>
            <tr>
                <td>11h</td>
                
            </tr>
            <tr>
                <td>12h</td>
                
            </tr>
            <tr>
                <td>13h</td>
                
            </tr>
            <tr>
                <td>14h</td>
                
            </tr>
            <tr>
                <td>15h</td>
                
            </tr>
            <tr>
                <td>16h</td>
                
            </tr>
            <tr>
                <td>17h</td>
                
            </tr>
            <tr>
                <td>18h</td>
                
            </tr>
        </tbody>
    </table>
</body>
<br>

</html>

<?php

$login = mysqli_connect("localhost", "root", "", "reservationsalles");
//$request = "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur";
$request = "SELECT * FROM reservations";
$query = mysqli_query($login, $request);
$result = mysqli_fetch_all($query);

var_dump($result);

$y = 0;
?>
<table>
    <?php
    while ($y < 11) {
        ?>
        <tr>
            <?php
                $x = 0;
                while ($x < 5) {
                    //${'var' . $y . "_" . $x} = $y . "_" . $x;
                    //$yoyo =  $y . "_" . $x;
                    $yoyo = NULL;
                    $i = 0;
                    while ($i < count($result)) {
                        if ($result[$i][6] == $y . "_" . $x) {
                            $yoyo = $result[$i][2];
                        }
                        ++$i;
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