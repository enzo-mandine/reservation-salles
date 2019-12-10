<?php
	function sql_request(string $request, bool $isData = false)
	{
		$conn = mysqli_connect("localhost","root","","reservationsalles");
		$query = mysqli_query($conn,$request);
		
		if($isData)
		{
			return mysqli_fetch_all($query);
		}
		else
		{
			return true;
		}
		
		mysqli_close($conn);
	}
	
	
	
	
?>