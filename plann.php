<table>

<?php

	$year = getdate()["year"];
	$day_of_year = getdate()["yday"];
	
	
	// 31 30 31 30 31 30 31 31 30 31 30 31
	if(isset($_GET["page"]))
	{
		$day_of_year += 7*$_GET["page"];
	}
	
	$max_month_date = intval( date("t", strtotime($year."W".floor(($day_of_year/7)+1))));
	$cur_month = 1+intval( date("m", strtotime($year."W".floor(($day_of_year/7)+1))));
	$thisWeek = intval( date("j", strtotime($year."W".floor(($day_of_year/7)+1))));
	$days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi");
	
	$request_reservations = "SELECT titre, utilisateurs.login, date_format(debut,'%w %k %d'), date_format(fin,'%w %k %d') 
							FROM reservations INNER JOIN utilisateurs ON reservations.id_createur = utilisateurs.id
							WHERE date_format(debut, '%d %c %Y') >= '".$thisWeek." ".$cur_month." ".$year."'";
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
				$date = $thisWeek + ($day-1);
				if ($date > $max_month_date)
				{
					$date -= $max_month_date;
				}
				echo "<th>".$days[$day-1]."-".$date."</th>";
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
				if ( getdate()["mday"] > $thisWeek+($day-1))
				{
					echo "<td class='red'></td>";
				}	
				else
				{
					echo "<td>";
					foreach($reservations as $reservation)
					{
						$reservation_day = explode(" ",$reservation[2])[0];
						$reservation_hour = explode(" ",$reservation[2])[1];
						
						if($reservation_day == $day && $reservation_hour == $hour)
						{
							echo $reservation[0];
						}										
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
	
	
	if(!isset($_GET["page"]))
	{?>
		<a href="planning.php?page=1">Semaine suivante</a>
<?php
	}
	else
	{  if($_GET["page"] >= 1) {?>
		<a href="planning.php?page=<?php echo $_GET["page"]+1; ?>">Semaine suivante</a><br/>
		<a href="planning.php?page=<?php echo $_GET["page"]-1; ?>">Semaine precedente</a>
<?php	
		}
		else
		{?>
			<a href="planning.php?page=<?php echo $_GET["page"]+1; ?>">Semaine suivante</a><br/>
<?php	}
	}
?>

</table>