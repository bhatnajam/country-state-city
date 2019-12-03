<?php
	$link=mysqli_connect("localhost","root","","ajax2"); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajax Example 3</title>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#country').change(function(){
				var c = $(this).val();
				//alert(c);

				// $.get("states_api.php",{conid:c},function(res){
				// 	 //alert(res);

				// 	$('#states').html(res);
				// 	$('#statesspan').css("visibility","visible");

				$.ajax({
						url : 'states_api.php',
						method : 'get',
						data : {conid:c},
						success : function(res)
						{
							$('#states').html(res);
							$('#statesspan').css("visibility","visible");

						},
						error : function()
						{
							alert("Not Working");
						}

				});
			});


			//--------------------------------------



			$('#states').change(function(){
				var s = $(this).val();
				//alert(c);

				// $.get("states_api.php",{conid:c},function(res){
				// 	 //alert(res);

				// 	$('#states').html(res);
				// 	$('#statesspan').css("visibility","visible");

				$.ajax({
						url : 'cities_api.php',
						method : 'get',
						data : {statid:s},
						success : function(res)
						{
							// alert(res);
							$('#cities').html(res);
							$('#citiesspan').css("visibility","visible");

						},
						error : function()
						{
							alert("Not Working");
						}

				});
			});
		});



	</script>
</head>
<body>
	Country <select id="country">
		<option hidden>Select</option>
		<?php
			$sel= mysqli_query($link,"select * from countries");
			while($arr = mysqli_fetch_assoc($sel))
			{
		?>	
			<option value="<?=$arr['id']?>"><?= $arr['name']?></option>
		<?php
			}
		 ?>
	</select>

	<span id="statesspan" style="visibility: hidden;">
		States <select id="states"></select>
	</span>

	<span id="citiesspan" style="visibility: hidden;">
		Cities <select id="cities"></select>
	</span>
	
</body>
</html>


