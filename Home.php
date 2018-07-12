<?php
 session_start();
 if (!isset($_SESSION["id"])) {
   header('Location: Index.php');
}
include 'connect.php';
	$sql_query_admin="select * from admin";
$result_admin=mysqli_query($conn,$sql_query_admin);
$row_admin = mysqli_fetch_array($result_admin, MYSQLI_ASSOC);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row_admin['NAME'] ?></title>
	<meta name="viewport" content="width=decive-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/mycss.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body, html {
		height: 100%;
		margin: 0;
	}

.bg {
    /* The image used */
    background-image: url("backg.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
	
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
    	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navHeaderCollapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="http://www.thomsonfoods.com/" target="_blank"><b><i><?php echo $row_admin['NAME'] ?></i></b></a>
	</div>
			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class = "nav navbar-nav navbar-right">
				<li><a href="Item.php"><b>Product</b></a></li>
				<li><a href="Customer.php"><b>Customer</b></a></li>
				<li><a href="Order.php"><b>Order</b></a></li>
				<li><a href="Payment.php"><b>Payment</b></a></li>
				<li><a href="Configuration.php"><b>Configuration</b></a></li>
				<li><a href="Logout.php"><b>Logout</b></a></li>
				</ul>
			</div>
			
			</div>
			</nav>
			
			<div class="bg"></div>
</body>
</html>