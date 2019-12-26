<table>

<?php

	$year = getdate()["year"];
	$day_of_year = getdate()["yday"];
	$curTime = strtotime("last monday");
	
	if(isset($_GET["page"])) {
		$curTime =  strtotime("+".$_GET["page"]." week", $curTime);
	}
	
	$days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi");
	
	$request_reservations = "SELECT titre, utilisateurs.login, date_format(debut,'%w %k %d'), reservations.id 
							FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id
							WHERE date_format(debut, '%d %c %Y') >= '".date("d m Y",$curTime)."'";
	
	$reservations = sql_request($request_reservations, true);
	
	$hour = 7;					
	while($hour < 20)
	{ 
		$day = 0;
		
		if($hour == 7)
		{
			echo "<thead>";
		}
		else
		{
			echo "<tr>";
		}

		while($day < 6)
		{
			if($hour == 7 && $day > 0)
			{
				echo "<th>".date("l d", strtotime("monday +".($day-1)." day", $curTime))."</th>";
			}
			else if($day == 0 && $hour > 7)
			{
				echo "<td>".$hour."h</td>";
			}
			else if($day == 0 && $hour == 7)
			{
				echo "<td></td>";
			}
			else 
			{
				if ( getdate()[0] > date("U", strtotime("+".($day-1)." day",$curTime))) {
					echo "<td class='red'></td>";
				}	
				else {
					echo "<td>";
						$is_reserved = false;
						foreach($reservations as $reservation)	{
							$reservation_day = explode(" ",$reservation[2])[0];
							$reservation_hour = explode(" ",$reservation[2])[1];
							$reservation_date = explode(" ",$reservation[2])[2];
							
							if($reservation_day == $day && $reservation_hour == $hour && $reservation_date == date("d", strtotime("+".($day-1)." day",$curTime)))	{?>
								<a href='reservation.php?id=<?php echo $reservation[3]; ?>'><?php echo $reservation[0]; ?></a>
						<?php	$is_reserved = true;
							}						
						}
						
						if(!$is_reserved)	{
							echo "<a href='reservation-form.php'><input class='btn_add' type='button' value='+'></a>";
						}
					
					echo "</td>";									
				}	
			}
			$day ++;
		}
		
		if($hour == 7)
		{
			echo "</thead>";
		}
		else
		{
			echo "</tr>";			
		}
		$hour++;
	}
?>
	</table>

<?php
	if(!isset($_GET["page"]))
	{?>
		<a id="nextWeek" href="planning.php?page=1">Semaine suivante</a>
<?php
	}
	else
	{  if($_GET["page"] > 1) {?>
		<a id="prevWeek" href="planning.php?page=<?php echo $_GET["page"]-1; ?>">Semaine precedente</a>
		<a id="nextWeek" href="planning.php?page=<?php echo $_GET["page"]+1; ?>">Semaine suivante</a>
<?php	
		}
		else if($_GET["page"] == 1)
		{?>
			<a id="prevWeek" href="planning.php">Semaine precedente</a>
			<a id="nextWeek" href="planning.php?page=<?php echo $_GET["page"]+1; ?>">Semaine suivante</a>
<?php	}
		else
		{?>
			<a id="nextWeek" href="planning.php?page=<?php echo $_GET["page"]+1; ?>">Semaine suivante</a>
<?php	}
	}
?>
