<?php
	session_start();
	$OID=$_GET["OID"];
	include 'connect.php';
	$sql_query_sold="select * from order_table where OID = $OID";
	$result=mysqli_query($conn,$sql_query_sold);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	$QUANTITY=$row['QUANTITY'];
	$ITEM=$row['ITEM'];
	$TOTAL=$row['TOTAL'];
	$CUSTOMER=$row['CUSTOMER'];
	$sql_query_update_sold="UPDATE item SET UNITS_SOLD=UNITS_SOLD -".$QUANTITY." WHERE NAME='".$ITEM."'";
	$result_update_sold=mysqli_query($conn,$sql_query_update_sold);
	
}
	
	
	echo $sql_query_update_customer="UPDATE customer SET OUTSTANDING=OUTSTANDING -".$TOTAL." WHERE NAME='".$CUSTOMER."'";
	$result_update_customer=mysqli_query($conn,$sql_query_update_customer);
	
	
	$sql_query="delete from order_table where OID = $OID";
	$result_delete=mysqli_query($conn,$sql_query);
	header('Location: Order.php');
?>