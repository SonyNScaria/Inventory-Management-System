<?php
session_start();
include 'connect.php';
$DATE=$_POST["date"];
$CUSTOMER=$_POST["customer"];
$ADJUSTMENT=$_POST["adjustment"];
$SALESTAX=$_POST["Sales_Tax"];
$TOTAL=$_POST['Total'];
$RANDOM=rand();
$flag=0;

for($i=0;$i<sizeof($_POST["item"]);$i++)
{
	$ITEM=$_POST["item"][$i];
	$UNIT_PRICE=$_POST["unit_price"][$i];
	$QUANTITY=$_POST["quantity"][$i];
	$PRICE=$_POST["price"][$i];
	$sql_query_add="INSERT INTO `order_table` (`OID`, `ITEM`,`UNIT_PRICE`, `QUANTITY`, `DATE`, `CUSTOMER`, `ADJUSTMENT`, `SALESTAX`,`TOTAL` ) VALUES ('$RANDOM', '$ITEM', '$UNIT_PRICE','$QUANTITY','$DATE','$CUSTOMER', '$ADJUSTMENT','$SALESTAX`','$TOTAL`')";
	$result_add=mysqli_query($conn,$sql_query_add);
	 echo $sql_query_sold_item="UPDATE item SET UNITS_SOLD=UNITS_SOLD+".$QUANTITY." WHERE NAME='".$ITEM."'";
	$result_add_sold_item=mysqli_query($conn,$sql_query_sold_item);
	if($flag==0)
	{
	 echo $sql_query_cust_outstanding="UPDATE customer SET OUTSTANDING=OUTSTANDING+".$TOTAL." WHERE NAME='".$CUSTOMER."'";
	$result_add_cust_outstanding=mysqli_query($conn,$sql_query_cust_outstanding);
	$flag=1;
	}

}

header('Location: Order.php');

?>