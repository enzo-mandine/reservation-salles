<!DOCTYPE html>
<html lang="fr">

<body class="mp0">


		<article class="flexcol">
		
			<form class="reservix-form" method="post" action="">
				
				
				<div id="day-zone" class="input-zone">
					<label for="jour">Quels jours :</label>
					<input type="checkbox" class="" value="Monday" name="jour">Lundi
					<input type="checkbox" class="" value="Tuesday" name="jour">Mardi
					<input type="checkbox" class="" value="Wednesday" name="jour">Mercredi
					<input type="checkbox" class="" value="Thursday" name="jour">Jeudi
					<input type="checkbox" class="" value="Friday" name="jour">Vendredi
				</div>
				
				<div class="input-zone">
					<label for="hour">Quelle heure ?</label>
					<input type="time" name="hour" min="08:00" max="17:00" value="08:00"/>
				</div>
				
				<div class="input-zone">
					<label for="date">A partir</label>
					<input type="datetime-local" name="date"/>
				</div>
				
				<div class="input-zone">
					<label for="repeat">Pendant</label>
					<select name="repeat">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
					<select name="unit">
						<option value="sem">Semaines</option>
						<option value="mois">Mois</option>
					</select>
				</div>
				
				<div class="input-zone">
					<label for="titre">Titre</label>
					<input type="text" name="titre"/>
				</div>
				
				<div class="input-zone" id="textarea">
					<label for="desc">Description</label>
					<textarea name="desc" cols="50" rows="5"></textarea>
				</div>
				
				
				
				<input type="submit" name="submitBtn"/>
			</form>
		
		</article>
	</main>
</body>

</html>


<style>

	.flexcol{
		display:flex;
		flex-direction:column;
	}
	
	.reservix-form{
		display:flex;
		flex-direction:column;
		margin:auto;
		border-radius:5px;
		background:#ffffff;
	}
	
	.input-zone {
		margin:10px;
		align-self:flex-start;
	}

	#textarea
	{
		display:flex;
		flex-direction:column;
	}
</style>