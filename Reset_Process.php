<?php
 session_start();
 include 'connect.php';
 $email=$_POST['old_email'];
 $password=$_POST['old_password'];
 $new_email=$_POST['new_email_1'];
 $new_password=$_POST['new_password'];
 echo $sql_query="Select * from login where EMAIL='$email' and PASSWORD='$password'";
 $result=mysqli_query($conn,$sql_query);
 $row=mysqli_fetch_array($result);
 if($row)
 {
 if ($row['EMAIL']==$email && $row['PASSWORD']==$password)
 {
	 echo $sql_query="Update login set EMAIL='$new_email' , PASSWORD='$new_password' where EMAIL='$email' and PASSWORD='$password'";
	 $result=mysqli_query($conn,$sql_query);
	 //
	 
	 //The form has been submitted, prep a nice thank you message
    	$output = '<h1>Thanks for your file and message!</h1>';
    	//Set the form flag to no display (cheap way!)
    	$flags = 'style="display:none;"';

    	//Deal with the email
    	//$to = $new_email;
    	$subject = 'Notification: Administration login credentials updated';

    	$message = 'Updated password: '.$new_password.' .Please keep it confidential.It is an auto-generated email, please do not reply. Thank you.';
		
    	$boundary =md5(date('r', time())); 

    	$headers = "From: THOMSON_FOODS\r\nReply-To: info@thomsonfoods.com";
    	//$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";

    	/*$message="This is a multi-part message in MIME format.

--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

--_2_$boundary
Content-Type: text/plain; charset=\"iso-8859-1\"
Content-Transfer-Encoding: 7bit

$message

--_2_$boundary--
--_1_$boundary
Content-Type: application/octet-stream; name=\"$filename\" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

$attachment
--_1_$boundary--";*/

    	mail($new_email, $subject, $message, $headers);
    
	 
	 //
	 header('Location: Index.php?status=1'); 
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