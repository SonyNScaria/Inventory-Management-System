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
			
			$sql_query_delete="delete from customer where ID=$ID";
			$result_delete=mysqli_query($conn,$sql_query_delete);
		}
		}
	}
	header('Location: Customer.php');
 ?>