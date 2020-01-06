<link rel="stylesheet" href="tablestyle.css">
<?php
if (!isset($_GET["page"])) { ?>
	<a id="nextWeek" class="flexr flexend" href="planning.php?page=1"> <input type="button" class="btn" value="&#x2B9E"> </a>
	<?php
} else {
	if ($_GET["page"] > 1) { ?>
		<div class="flexr spacebetween">
			<a id="prevWeek" href="planning.php?page=<?php echo $_GET["page"] - 1; ?>"><input type="button" class="btn mb15" value="&#x2B9C"> </a>
			<a id="nextWeek" href="planning.php?page=<?php echo $_GET["page"] + 1; ?>"><input type="button" class="btn mb15" value="&#x2B9E"></a>
		</div>
	<?php
	} else if ($_GET["page"] == 1) { ?>
		<div class="flexr spacebetween">
			<a id="prevWeek" href="planning.php"><input type="button" class="btn mb15" value="&#x2B9C"> </a>
			<a id="nextWeek" href="planning.php?page=<?php echo $_GET["page"] + 1; ?>"><input type="button" class="btn mb15" value="&#x2B9E"></a>
		</div>
	<?php	} else { ?>
		<a id="nextWeek" href="planning.php?page=<?php echo $_GET["page"] + 1; ?>"><input type="button" class="btn mb15" value="&#x2B9E"></a>
<?php	}
}
?>
<table class="table_res">

	<?php

	$year = getdate()["year"];
	$day_of_year = getdate()["yday"];
	$curTime = strtotime("monday");

	if (isset($_GET["page"])) {
		$curTime =  strtotime("+" . $_GET["page"] . " week", $curTime);
	}

	$days = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi");

	$request_reservations = "SELECT titre, utilisateurs.login, date_format(debut,'%w %k %d'), reservations.id 
							FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id
							WHERE date_format(debut,'%d %c %Y') >= '" . date("d m Y", $curTime) . "'";

	$reservations = sql_request($request_reservations, true);

	$hour = 7;
	while ($hour < 20) {
		$day = 0;

		if ($hour == 7) {
			echo "<thead>";
		} else {
			echo "<tr>";
		}

		while ($day < 6) {
			if ($hour == 7 && $day > 0) {
				echo "<th>" . date("l d", strtotime("monday +" . ($day - 1) . " day", $curTime)) . "</th>";
			} else if ($day == 0 && $hour > 7) {
				echo "<td>" . $hour . "h</td>";
			} else if ($day == 0 && $hour == 7) {
				echo "<td></td>";
			} else {
				if (getdate()[0] > date("U", strtotime("+" . ($day - 1) . " day", $curTime))) {
					echo "<td class='red'></td>";
				} else {
					echo "<td>";
					$is_reserved = false;
					foreach ($reservations as $reservation) {
						$reservation_day = explode(" ", $reservation[2])[0];
						$reservation_hour = explode(" ", $reservation[2])[1];
						$reservation_date = explode(" ", $reservation[2])[2];

						if ($reservation_day == $day && $reservation_hour == $hour && $reservation_date == date("d", strtotime("+" . ($day - 1) . " day", $curTime))) { ?>
							<a href='reserved.php?id=<?php echo $reservation[3]; ?>'><input class='res_slot' type='button' value="<?php echo $reservation[0]; ?>"></a>
	<?php $is_reserved = true;
						}
					}

					if (!$is_reserved) {
						echo "<a href='reservation-form.php'><input class='btn_add' type='button' value='+'></a>";
					}

					echo "</td>";
				}
			}
			$day++;
		}

		if ($hour == 7) {
			echo "</thead>";
		} else {
			echo "</tr>";
		}
		$hour++;
	}
	?>
</table>