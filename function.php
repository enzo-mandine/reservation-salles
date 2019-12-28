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
		<div class="err">
			<p><?php echo $str; ?><a href="index.php"><img src="Images/closeBtn.png"/></a></p>
		</div>
<?php 
	}  
?>