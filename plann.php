<link rel="stylesheet" href="tablestyle.css">


<?php
	if(!isset($_GET["page"])) // Si $_GET["page"] n'est pas definis
	{?>
		<a id="nextWeek" class="flexr flexend" href="planning.php?page=1"> <input type="button" class="btn" value="&#x2B9E" > </a>
<?php //On affiche le boutton pour avancer a la semaine prochaine en définissant $_GET["page"] a 1
	}
	else
	{  if($_GET["page"] > 1 && $_GET["page"] != 4) { // Si $_GET["page"] est supérieur a 1
	?>
		<!--On affiche les boutons pour avancer ($_GET["page"]+1) et pour reculer ($_GET["page"]-1) -->
		<div class="flexr spacebetween">
			<a id="prevWeek" href="planning.php?page=<?php echo $_GET["page"]-1; ?>"><input type="button" class="btn" value="&#x2B9C" > </a>
			<a id="nextWeek" href="planning.php?page=<?php echo $_GET["page"]+1; ?>"><input type="button" class="btn" value="&#x2B9E" ></a>
		</div>	
<?php	
		}
		else if($_GET["page"] == 1)	{  // Si $_GET["page"] vaut 1	?>
			<!-- On affiche le bouton pour avancer ($_GET["page"]+1) et le bouton pour revenir a la semaine en cour redirige vers planning.php-->
			<div class="flexr spacebetween">
				<a id="prevWeek" href="planning.php"><input type="button" class="btn" value="&#x2B9C" > </a>
				<a id="nextWeek" href="planning.php?page=<?php echo $_GET["page"]+1; ?>"><input type="button" class="btn" value="&#x2B9E" ></a>
			</div>
<?php	}
		else if ($_GET["page"] == 4) {?>
			<div class="flexr spacebetween">
				<a id="nextWeek" href="planning.php?page=<?php echo $_GET["page"]-1; ?>"><input type="button" class="btn" value="&#x2B9C" ></a>
			</div>
<?php	}
	}
?>


<table class="table_res">

<?php
	$today = getdate()[0];
	
	if (getdate()["wday"] == 6 && getdate()["wday"] == 7) { // Si nous somme un week-end
		$curTime = strtotime("monday"); //Temp Unix du prochain lundi
	}
	else { 
		$curTime = strtotime("last monday"); //Temp Unix du dernier lundi
	}
	
	
	if(isset($_GET["page"])) {
		/*
			Si on veut accéder aux semaines suivantes, on redefinis $curTime en temps unix 
			en y ajoutant $_GET["page"] semaine(s)	en partant du dernier $curTime (du dernier lundi enregistré)
		*/
		$curTime =  strtotime("+".$_GET["page"]." week", $curTime); 
	}
	
	
	$days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi"); // Permet d'afficher les jours de la semaine en francais
	
	
	
	/* 
		On sélectionne les titre, nom d'utilisateurs, date et id 
		des réservation enregistré apres $curTime ( WHERE date_format(debut, '%d %c %Y') >= date("d m Y",$curTime) )
		
	*/
	$request_reservations = "SELECT titre, utilisateurs.login, date_format(debut,'%w %k %d'), reservations.id 
							FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id
							WHERE date_format(debut, '%d %c %Y') >= '".date("d m Y",$curTime)."'";
	
	$reservations = sql_request($request_reservations, true);
	
	
	/*
		Les heures sont les lignes du tableau
		Les jours sont les colonnes du tableau
	*/
	
	
	$hour = 7; // Les réservations commencent a 8h mais on a besoin d'une ligne en plus pour les <thead>
	
	while($hour < 19) //On doit faire 12 tours de boucle pour afficher toutes les heures de 8h a 18h + les <thead>
	{ 
		$day = 0; // A chaque ligne, on redéfinis les jours a 0
		
		
		if($hour == 7) // Si c'est la premiere ligne, on ouvre les <thead> pour y écrire date et jour
		{
			echo "<thead>";
		}
		else // Sinon, on laisse un <tr> pour y écrire nos réservations
		{
			echo "<tr>";
		}

		while($day < 6) // A chaque tour de ligne, on doit mettre 6 colonnes pour les jours
		{
			if($hour == 7 && $day > 0) // Si c'est la deuxieme (ou plus) colonne de la premiere ligne
			{
				echo "<th>".date("l d", strtotime("monday +".($day-1)." day", $curTime))."</th>"; // On affiche le jour et la date
			}
			else if($hour > 7 && $day == 0) // Si c'est la deuxieme (ou plus) ligne et la premiere colonne
			{
				echo "<td>".$hour."h</td>"; // On affiche l'heure
			}
			else if($day == 0 && $hour == 7) // Si c'est la premiere ligne et la premiere colonne
			{
				echo "<td></td>"; // On affiche un <td> vide
			}
			else //Sinon, nous somme entre la deuxieme ligne et la deuxieme colonne (en dessous de la ligne des jours et a droite de la colonne des heures)
			{
				
				$checkReserv = false;
				
				$curYear = date("Y",$today);				
				$displayYear = date("Y", strtotime("+".($day-1)." day", $curTime) );
				
				// Si la date actuelle est supérieure a la date affiché dans le tableau
				if( $curYear >= $displayYear) {
					if($curYear == $displayYear) {
						$curMonth = date("m",$today);
						$displayMonth = date("m", strtotime("+".($day-1)." day", $curTime) );
						
						if($curMonth >= $displayMonth) {
							if($curMonth == $displayMonth) {
								$curDate = date("j", $today);
								$displayDate = date("j", strtotime("+".($day-1)." day", $curTime) );
								
								if($curDate >= $displayDate) {
									if($curDate == $displayDate) {
										$curHour = getdate()["hours"];
										$displayHour = $hour;
										
										if($curHour+1 >= $displayHour) {
											echo "<td class='red'></td>";
										}
										else {
											$checkReserv = true;
										}
									}
									else {
										echo "<td class='red'></td>";
									}
								}
								else {
									$checkReserv = true;
								}

							}
							else {
								echo "<td class='red'></td>";
							}
						}
						else {
							$checkReserv = true;
						}
					}
					else {
						echo "<td class='red'></td>";						
					}
				}
				else {
					$checkReserv = true;
				}

				if($checkReserv)
				{
					check_reservation($reservations,$day,$hour,$curTime);
				}					
			}
			$day ++;
		}
		
		if($hour == 7) // Si c'est la premiere ligne, on ferme le <thead>
		{
			echo "</thead>";
		}
		else // Sinon on ferme le <tr>
		{
			echo "</tr>";			
		}
		$hour++;
	}
?>
	</table>
