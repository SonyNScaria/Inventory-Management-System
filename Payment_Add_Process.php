<?php
session_start();
include 'connect.php';
if(isset($_POST['no']))
{
	$counter=$_POST['no'];
	for ($i=0;$i<$counter;$i++)
	{
		if((!empty($_POST["amount".$i])))
		{
			$DATE=$_POST["date".$i];
			$AMOUNT=$_POST["amount".$i];
			$CUSTOMER=$_POST["customer".$i];
			$REMARK=$_POST["remark".$i];
			$sql_query_get_PID="select max(PID) from payment";
			$result_get_PID=mysqli_query($conn,$sql_query_get_PID);
			$row=mysqli_fetch_array($result_get_PID);
			$PID=$row['max(PID)']+1;
			$sql_query_add="INSERT INTO `payment` (`PID`, `CUSTOMER`, `DATE`, `AMOUNT`, `REMARK`) VALUES ('$PID', '$CUSTOMER', '$DATE','$AMOUNT','$REMARK')";
			$result_add=mysqli_query($conn,$sql_query_add);
			$sql_query_update="UPDATE customer SET OUTSTANDING=OUTSTANDING-".$AMOUNT." WHERE NAME='".$CUSTOMER."'";
			$result_update=mysqli_query($conn,$sql_query_update);
			
			/*
			$sql_query_get_TID="select max(TID) from transaction";
			$result_get_TID=mysqli_query($conn,$sql_query_get_TID);
			$row=mysqli_fetch_array($result_get_TID);
			$TID=$row['max(TID)']+1;
			echo $sql_query_addT="INSERT INTO `transaction` (`TID`, `OID`, `PID`, `FLAG`) VALUES ('$TID', '0', '$PID', 'PAYMENT');";
			$result_get=mysqli_query($conn,$sql_query_addT);
			*/
		}
		}
		
	}

header('Location: Payment.php');
?>