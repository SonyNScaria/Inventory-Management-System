<?php
 session_start();
 include 'connect.php';
 $sql_query="Select * from customer";
	$result=mysqli_query($conn,$sql_query);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
	{ 	
	
		if(isset($_POST[$row['ID']]))
		{
		if($row['ID']==$_POST[$row['ID']])
		{
			$ID=$_POST[$row['ID']];
			$NAME=$_POST["name".$row['ID']];
			$ADDRESS=$_POST["address".$row['ID']];
			$SHIPPING_ADDRESS=$_POST["shipping_address".$row['ID']];
			$PHONE=$_POST["phone".$row['ID']];
			$EMAIL=$_POST["email".$row['ID']];
			$OUTSTANDING=$_POST["outstanding".$row['ID']];
			$sql_query_update="update customer set NAME='$NAME', ADDRESS='$ADDRESS',SHIPPING_ADDRESS='$SHIPPING_ADDRESS', PHONE='$PHONE' , EMAIL='$EMAIL' ,OUTSTANDING='$OUTSTANDING'  where ID=$ID";
			$result_update=mysqli_query($conn,$sql_query_update);
		}
		}
	}
	header('Location: Customer.php');
 ?>