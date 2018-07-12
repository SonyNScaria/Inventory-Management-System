<?php

	$dbhost = 'localhost';
	$username = 'admin_sony';
	$password = '11mca152';
	$conn=mysqli_connect("$dbhost", "$username", "$password");
	if(!$conn)
	{
		echo "Error Occured";
		die("Connection Failed: ".mysqli_connect_error());	
	}
	mysqli_select_db($conn,"thomson_food");
	
	
	

?>