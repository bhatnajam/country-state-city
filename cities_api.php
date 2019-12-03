<?php 
	$link = mysqli_connect("localhost","root","","ajax2");


	if(isset($_GET['statid'])) 
	{
		$stateid = $_GET['statid'];
		$query = "select * from cities where state_id='$stateid'";
		$sel = mysqli_query($link,$query);

		echo "<option hidden>Select</option>";

		while($arr = mysqli_fetch_assoc($sel))
		{
			$id=$arr['id'];
			
			$cname=$arr['name'];

			echo "<option value='$id'>$cname</option>";
		}
	}



 ?>