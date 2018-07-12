<!DOCTYPE html>
<html>
<head>
	<title>Real Food</title>
	<meta name="viewport" content="width=decive-width, initial-scale=1">

	<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstarp.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstarp-theme.min.css">
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstarp.min.js"></script>
	-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/mycss.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
function validateForm() {
    var x = document.forms["myForm"]["new_email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Please provide valid email address !");
		location.reload();
		
        return false;
    }
}
</script>
</head>
<body>
<?php
if($_GET)
{
if($_GET['status']==404)
{
echo '<script type="text/javascript">
          window.onload = function () { alert(" Invalid Email or Password ! "); }
</script>';
}
if($_GET['status']==405)
{
echo '<script type="text/javascript">
          window.onload = function () { alert(" You are successfully logged out ! "); }
</script>';
}
if($_GET['status']==1)
{
echo '<script type="text/javascript">
          window.onload = function () { alert(" Login credentails updated successfully ! "); }
</script>';
}
}
?>
<div class="homepage-hero-module">
    <div class="video-container">
        <div class="filter"></div>
        <video autoplay loop class="fillWidth">
            <source src="I_Just_Wanted.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
			
            <source src="I_Just_Wanted.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
        </video>
        <div class="poster hidden">
            <img src="I_Just_Wanted.jpeg" alt="">
        </div>
		
    </div>
</div>

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">
				<h1 class="text-center">Thomson Foods Inc.</h1>
			</div>

			<div class="modal-body">
				<form name="myForm" class="col-md-12 center-block" action="Login_Process.php" onsubmit="return validateForm();" method="POST">
					<div class="form-group">
						<input type="text" name="new_email" class="form-control input-lg" placeholder="Email">
					</div>

					<div class="form-group">
						<input type="password" name="password" class="form-control input-lg" placeholder="Password">
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-block btn-lg btn-primary" value="Login">
					</div>

					<div class="form-group">
						<span class="pull-right"><a href="#" data-toggle="modal" data-target="#myModal"> Reset Credentails ? </a>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="col-mid-12">
				</div>

			</div>

			</div>
		
	</div>	
	<!-- Start Model Window -->
	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Reset Credentails:</b></h4>
        </div>
        <div class="modal-body">
          <form name="myForm" class="col-md-12 center-block" method=POST action="Reset_Process.php" onsubmit="return validateForm();">
					<div class="form-group">
						<input type="text" name="old_email" class="form-control input-lg" placeholder="Old Email">
					</div>

					<div class="form-group">
						<input type="password" name="old_password" class="form-control input-lg" placeholder="Old Password">
					</div>
					<div class="form-group">
						<input type="text" name="new_email" class="form-control input-lg" placeholder="New Email">
					</div>

					<div class="form-group">
						<input type="password" name="new_password" class="form-control input-lg" placeholder="New Password">
					</div>
					
					<div class="form-group">
						<input type="submit" class="btn-sm btn-primary" value="Submit">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
        
		</form>
		</div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
  
</div>

					

	<!-- Stop Model Window -->	 
</body>
</html>