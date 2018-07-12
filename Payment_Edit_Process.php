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
			$DATE=$_POST["date".$row['PID']];
			$CUSTOMER=$_POST["customer".$row['PID']];
			$AMOUNT=$_POST["amount".$row['PID']];
			$REMARK=$_POST["remark".$row['PID']];
			$sql_query_update="update payment set DATE='$DATE', CUSTOMER='$CUSTOMER', AMOUNT='$AMOUNT' , REMARK='$REMARK'  where PID=$PID";
			$result_update=mysqli_query($conn,$sql_query_update);
			$sql_query_update_customer="UPDATE customer SET OUTSTANDING=OUTSTANDING-".$AMOUNT." WHERE NAME='".$CUSTOMER."'";
			$result_update_customer=mysqli_query($conn,$sql_query_update_customer);
		}
		}
	}
	header('Location: Payment.php');
 ?>