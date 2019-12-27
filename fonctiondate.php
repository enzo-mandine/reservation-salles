<?php
session_start();
echo $_GET["location"];

if ($_GET["location"][3] == 1) {
    $_GET["heures"] = "8h";
} elseif ($_GET["location"][3] == 2) {
    $_GET["heures"] = "8h";
}

$z = 8;
$y = 0;
while ($z < 12) {
}


if (isset($_POST["submit"])) {
   if(!empty(sql_request("SELECT * FROM reservations WHERE id_heures_jours == '".$_GET["location"]."'", true, true))."'") {
       header("location:reservation-form.php?location='".$_GET["location"]."'");
   }
}