<?php
 session_start();
 if (!isset($_SESSION["id"])) {
   header('Location: Index.php');
}
?>
<?php
include 'connect.php';
$sql_query_admin="select * from admin";
$result_admin=mysqli_query($conn,$sql_query_admin);
$row_admin = mysqli_fetch_array($result_admin, MYSQLI_ASSOC);
?>
<html>
<head>
	<title><?php echo $row_admin['NAME'] ?></title>
	<meta name="viewport" content="width=decive-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/mycss.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
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
				<li><a href="Home.php"><b>Configuration</b></a></li>
				<li><a href="Logout.php"><b>Logout</b></a></li>
				</ul>
			</div>
			</div>
			</nav>
	<?php
	include 'connect.php';
	$sql_query="Select * from admin";
	$result=mysqli_query($conn,$sql_query);
	$COUNTER=1;
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
?>
	<div class="container">
  <h2></h2>    
<form class="col-md-12 center-block" action="Configuration_Process.php" method="POST">  
<input type="hidden" class="form-control" name="no" value="<?php echo $counter; ?>">
  <table class="table table-condensed">
    <thead>
      <tr>
		<th>Administrator Contact</th>
      </tr>
    </thead>
    <tbody>
		<tr>
		<td>Company Name</td>
		<td><input type="text" class="form-control" name="NAME" value="<?php echo $row['NAME'] ?>"></td>
		</tr>
		<tr>
		<td>Phone Number</td>
		<td><input type="text" class="form-control" name="PHONE" value="<?php echo $row['PHONE'] ?>"></td>
		</tr>
		<tr>
		<td>Email</td>
		<td><input type="text" class="form-control" name="EMAIL" value="<?php echo $row['EMAIL'] ?>"></td>
		</tr>
		<tr>
		<td>Street Number & Name </td>
		<td><input type="text" class="form-control" name="STEET" value="<?php echo $row['STEET'] ?>"></td>
		</tr>
		<tr>
		<td>City</td>
		<td><input type="text" class="form-control" name="CITY" value="<?php echo $row['CITY'] ?>"></td>
		</tr>
		<tr>
		<td>Province</td>
		<td><input type="text" class="form-control" name="PROVINCE" value="<?php echo $row['PROVINCE'] ?>"></td>
		</tr>
		<tr>
		<td>Postal Code</td>
		<td><input type="text" class="form-control" name="POSTAL" value="<?php echo $row['POSTAL'] ?>"></td>
		</tr>
		
	</tbody>
</table>
<button type="submit" class="btn btn-primary pull-right">Save Changes</button>
</form>
</div>
</body>
</html>