<?php 
	$link = mysqli_connect("localhost","root","","ajax2");


	if(isset($_GET['conid'])) 
	{
		$countryid = $_GET['conid'];
		$query = "select * from states where country_id='$countryid'";
		$sel = mysqli_query($link,$query);

		echo "<option hidden>Select</option>";

		while($arr = mysqli_fetch_assoc($sel))
		{
			$id=$arr['id'];
			
			$sname=$arr['name'];

			echo "<option value='$id'>$sname</option>";
		}
	}



 ?>



