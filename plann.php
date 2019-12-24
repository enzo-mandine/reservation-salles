<table>

<?php

	$year = getdate()["year"];
	$day_of_year = getdate()["yday"];
	
	$thisWeek = intval( date("j", strtotime($year."W".floor(( $day_of_year/7)+1))) );
	$days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi");
	
	$request_reservations = "SELECT titre, utilisateurs.login, date_format(debut,'%w %k %d'), date_format(fin,'%w %k %d') 
							FROM reservations INNER JOIN utilisateurs ON reservations.id_createur = utilisateurs.id
							WHERE date_format(debut, '%d') >= '".$thisWeek."'";
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
?>

</table>