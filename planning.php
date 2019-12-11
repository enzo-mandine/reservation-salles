<table>


<?php
	$days = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi");
	$row = 7;
	
	while($row < 20)
	{ 
		$column = 0;
		
		if($row == 7)
		{
			echo "<thead>";
		}
		else
		{
			echo "<tr>";
		}

		while($column < 6)
		{
			if($row == 7 && $column > 0)
			{
				echo "<th>".$days[$column-1]."</th>";
			}
			else if($column == 0 && $row > 7)
			{
				echo "<td>".$row."</td>";
			}
			else if($column == 0 && $row == 7)
			{
				echo "<td></td>";
			}
			else
			{
				echo "<td>";
					
				echo "</td>";				
			}
			
			$column ++;
		}
		
		if($row == 7)
		{
			echo "</thead>";
		}
		else
		{
			echo "</tr>";			
		}
		$row++;
	}

?>


</table>


<style>
	table th
	{
		width:150px;
	}
	
	table
	{
		text-align:center;
	}



</style>