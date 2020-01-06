<?php
	function sql_request(string $request, bool $isData = false, bool $isSingle = false)
	{
		$conn = mysqli_connect("localhost","root","","reservationsalles");
		$query = mysqli_query($conn,$request);
		
		if($isData)
		{
			if($isSingle)
			{
				return mysqli_fetch_row($query);
			}
			else
			{
				return mysqli_fetch_all($query);				
			}
		}
		mysqli_close($conn);
	}	
	
	function required($form)
	{
		foreach($form as $input)
		{
			if(empty($input))
			{
				return false;
			}
		}
		return true;
	}
	
	function error($str)
	{ ?>
		<div id="greyScreen">
			<div id="err">
				<p><?php echo $str; ?><a href="index.php"><img src="Images/closeBtn.png"/></a></p>
			</div>
		</div>
<?php 
	}  
	
	
	function check_reservation($reservations, $day, $hour, $curTime)
	{
		echo "<td>";

		$is_reserved = false; // Vérificateur de réservation (voir ligne 62)
		
		foreach($reservations as $reservation)	{ // On boucle dans les réservations sélectionnées
			$reservation_day  =	explode(" ",$reservation[2])[0]; // date_format(debut,"%w") -> le jour de la réservation
			$reservation_hour = explode(" ",$reservation[2])[1]; // date_format(debut,"%k")  -> l'heure de la réservation
			$reservation_date = explode(" ",$reservation[2])[2]; // date_format(debut,"%d")  -> la date de la réservation
			$reservation_month = explode(" ",$reservation[2])[3]; // date_format(debut,"%m")  -> le mois de la réservation
			
			// Si le jour de la réservation correspond a la valeur de $day, que l'heure correspond a la valeur de $hour et que la
			// date correspond a la date relative a $curTime
			if($reservation_day == $day && $reservation_hour == $hour && $reservation_date == date("d", strtotime("+".($day-1)." day",$curTime)) &&
				$reservation_month == date("m", strtotime("+".($day-1)." day",$curTime)))	{?>
				<a href='reserved.php?id=<?php echo $reservation[3]; ?>'><input class='res_slot' type='button' value="<?php echo $reservation[0]; ?>"></a> 
		<?php	$is_reserved = true; // On affiche le titre de la réservation dans un lien qui redirige vers la page de reservation
									 // avec l'id de la reservation en get et on précise que la case est reservée avec $is_reserved
			}						
		}
		
		if(!$is_reserved)	{ // Si la case n'a pas de réservation associé on affiche un bouton pour prendre une réservation
			echo "<a href='reservation-form.php'><input class='btn_add' type='button' value='+'></a>";
		}

		echo "</td>";
		
	}
?>