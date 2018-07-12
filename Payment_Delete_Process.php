<?php
 session_start();
 include 'connect.php';
 $sql_query="Select * from payment";
	$result=mysqli_query($conn,$sql_query);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
	{ 	
	
		if(isset($_POST[$row['PID']]))
		{
		if($row['PID']==$_POST[$row['PID']])
		{
			$PID=$_POST[$row['PID']];
			$AMOUNT=$row['AMOUNT'];
			$CUSTOMER=$row['CUSTOMER'];
			
			$sql_query_update_customer="UPDATE CUSTOMER SET OUTSTANDING=OUTSTANDING+".$AMOUNT." WHERE NAME='".$CUSTOMER."'";
			$result_update_customer=mysqli_query($conn,$sql_query_update_customer);
			
			$sql_query_delete_p="delete from payment where PID=$PID";
			
			$result_delete_p=mysqli_query($conn,$sql_query_delete_p);
			
		}
		}
	}
	header('Location: Payment.php');
 ?>