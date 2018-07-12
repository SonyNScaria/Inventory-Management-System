<?php
 session_start();
 include 'connect.php';
 $sql_query="Select * from item";
	$result=mysqli_query($conn,$sql_query);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
	{ 	
	
		if(isset($_POST[$row['ID']]))
		{
		if($row['ID']==$_POST[$row['ID']])
		{
			$ID=$_POST[$row['ID']];
			$NAME=$_POST["name".$row['ID']];
			$DESCRIPTION=$_POST["description".$row['ID']];
			$UNITWEIGHT=$_POST["unitweight".$row['ID']];
			$UNITPRICE=$_POST["unitprice".$row['ID']];
			$sql_query_update="update item set NAME='$NAME', DESCRIPTION='$DESCRIPTION', UNIT_WEIGHT='$UNITWEIGHT' , UNIT_PRICE='$UNITPRICE'  where ID=$ID";
			$result_update=mysqli_query($conn,$sql_query_update);
		}
		}
	}
	header('Location: Item.php');
 ?>