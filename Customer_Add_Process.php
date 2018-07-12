<?php
session_start();
include 'connect.php';
if(isset($_POST['no']))
{
	$counter=$_POST['no'];
	for ($i=0;$i<$counter;$i++)
	{
		if((!empty($_POST["name".$i]))) 
		{
			$NAME=$_POST["name".$i];
			$ADDRESS=$_POST["address".$i];
			$PHONE=$_POST["phone".$i];
			$EMAIL=$_POST["email".$i];
			$OUTSTANDING=$_POST["outstanding".$i];
			$SHIPPING_ADDRESS=$_POST["shipping_address".$i];
			echo $sql_query_add="INSERT INTO `customer` (`ID`, `NAME`, `ADDRESS`,`SHIPPING_ADDRESS`, `PHONE`, `EMAIL`, `OUTSTANDING`) VALUES ('$i', '$NAME','$ADDRESS','$SHIPPING_ADDRESS','$PHONE','$EMAIL',0)";
			$result_add=mysqli_query($conn,$sql_query_add);
		}
		
	}
}
header('Location: Customer.php');
?>