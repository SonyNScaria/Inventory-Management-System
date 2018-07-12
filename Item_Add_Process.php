<?php
session_start();
include 'connect.php';
if(isset($_POST['no']))
{
	$counter=$_POST['no'];
	for ($i=0;$i<$counter;$i++)
	{
		if((!empty($_POST["name".$i])) AND (!empty($_POST["unitprice".$i]))) 
		{
			$NAME=$_POST["name".$i];
			$DESCRIPTION=$_POST["description".$i];
			$UNITWEIGHT=$_POST["unitweight".$i];
			$UNITPRICE=$_POST["unitprice".$i];
			$sql_query_add="INSERT INTO `item` (`ID`, `NAME`, `DESCRIPTION`, `UNIT_WEIGHT`, `UNIT_PRICE`, `UNITS_SOLD`) VALUES ('$i', '$NAME','$DESCRIPTION','$UNITWEIGHT','$UNITPRICE', '0')";
			$result_add=mysqli_query($conn,$sql_query_add);
		}
		
	}
}
header('Location: Item.php');
?>