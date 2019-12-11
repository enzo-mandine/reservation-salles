<?php

$login = mysqli_connect("localhost", "root", "", "reservationsalles");
$request = "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur";
$query = mysqli_query($login, $request);
$result = mysqli_fetch_all($query);

var_dump($result);

$y = 0;
echo "<table>";
while ($y < 11) {
    echo "<tr>";
    $x = 0;
    while ($x < 5) {
        //${'var' . $y . "_" . $x} = $y . "_" . $x;
        $yoyo =  $y . "_" . $x;
        //${'var'.$result[0][9]} = $result[0][5];
        //$yoyo = $result[0][5];
        echo "<td>";
        //echo ${'var' . $y . "_" . $x};
        echo $yoyo;
        echo "</td>";
        ++$x;
    }
    ++$y;
    echo "</tr>";
}
/*
echo "</table>";
$y = 0;
while ($y < 11) {
    $x = 0;
    while ($x < 5) {
        var_dump(${'var' . $y . "_" . $x});
        ++$x;
    }
    ++$y;
}
*/
