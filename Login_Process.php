<?php
 session_start();
 include 'connect.php';
 $email=$_POST['new_email'];
 $password=$_POST['password'];
echo  $sql_query="Select * from login where EMAIL='$email' and PASSWORD='$password'";
 $result=mysqli_query($conn,$sql_query);
 $row=mysqli_fetch_array($result);
 if($row)
 {
 if ($row['EMAIL']==$email && $row['PASSWORD']==$password)
 {
	 $_SESSION["id"] = $row['ID'];
	 header('Location: Home.php'); 
 }
 else
 {
	 header('Location: Index.php?status=404'); 
 }
 }
 else{
	 header('Location: Index.php?status=404');
 }
 
 
?>