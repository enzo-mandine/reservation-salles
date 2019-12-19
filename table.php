<link rel="stylesheet" href="tablestyle.css">

<table class="table_res">
    <?php
    $result = sql_request("SELECT * FROM reservations", true);
    $y = 0;
    while ($y < 11) {
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
                    $yoyo = "<a href=\"reservation-form.php?location=" . $pos . "\"><input class='btn_add' type='button' value='+'></a>";
                    if ($result[$i][5] == $pos) {
                        $yoyo = "<div class='res_slot'><p class='txt_res_slot'>" . $result[$i][1] . "</p></div>";
                        break;
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
            ?>
                <td>
                    <?php
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