<?php
session_start();
 include 'connect.php';
 $sql_query="Select * from admin";
 $result=mysqli_query($conn,$sql_query);
			$NAME=$_POST["NAME"];
			$PHONE=$_POST["PHONE"];
			$EMAIL=$_POST["EMAIL"];
			$STEET=$_POST["STEET"];
			$CITY=$_POST["CITY"];
			$PROVINCE=$_POST["PROVINCE"];
			$POSTAL=$_POST["POSTAL"];

			echo $sql_query_update="UPDATE `admin` SET `NAME`='$NAME',`PHONE`='$PHONE',`EMAIL` = '$EMAIL',`STEET` = '$STEET',`CITY` = '$CITY',`PROVINCE` = '$PROVINCE',`POSTAL` = '$POSTAL' " ;
			$result_update=mysqli_query($conn,$sql_query_update);
		
	header('Location: Configuration.php');
?>