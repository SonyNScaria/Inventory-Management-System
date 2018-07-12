<?php
 session_start();
 if (!isset($_SESSION["id"])) {
   header('Location: Index.php');
}
 ?>
<?php
if(isset($_GET['name']))
{
$temp_Arr=$_GET['name'];
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
				<li><a href="Configuration.php"><b>Configuration</b></a></li>
				<li><a href="Logout.php"><b>Logout</b></a></li>
				</ul>
			</div>
			</div>
			</nav>
	<div class="container">
  <h2></h2>    
<form class="col-md-12 center-block" action="Customer_Edit_Process.php" method="POST">  
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
		<th>Shipping Address</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Outstanding</th>
      </tr>
    </thead>
	<?php
	if(empty($temp_Arr))
{
	$sql_query="Select * from customer";
	$result=mysqli_query($conn,$sql_query);
	$COUNTER=1;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	
	?>	
     <tbody>
		<tr>
		<td><input type="text" class="form-control" name="<?php echo "name".$row['ID']; ?>" value="<?php echo $row['NAME'] ?>"></td>
		<td><textarea class="form-control" name="<?php echo "address".$row['ID']; ?>" value=""><?php echo $row['ADDRESS'] ?></textarea></td>
		<td><textarea class="form-control" name="<?php echo "shipping_address".$row['ID']; ?>" value=""><?php echo $row['SHIPPING_ADDRESS'] ?></textarea></td>
        <td><input type="text" class="form-control" name="<?php echo "phone".$row['ID']; ?>" value="<?php echo $row['PHONE'] ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td>
		<td><input type="text" class="form-control" name="<?php echo "email".$row['ID']; ?>" value="<?php echo $row['EMAIL'] ?>"></td>
		<td><input type="text" class="form-control" name="<?php echo "outstanding".$row['ID']; ?>" value="<?php echo "$".$row['OUTSTANDING'] ?>" readonly onkeypress='return event.charCode >= 46 && event.charCode <= 57'></td>
		<td><input type="hidden" class="form-control" name="<?php echo $row['ID']; ?>" value="<?php echo $row['ID'] ?>"></td>
		</tr>
	 </tbody>
    <?php
}
}
else
{
	for($x = 0; $x < strlen($temp_Arr); $x++) {
	if((strcmp($temp_Arr[$x],','))==0)
	{
		
	}
	else
	{ 
		$bla='';
		while((strcmp($temp_Arr[$x],',')!=0))
		{
			
			$bla.=$temp_Arr[$x];
			$x++;
			
		}
		//echo intval($bla);
		$sql_query="Select * from customer where ID=$bla";
		$result=mysqli_query($conn,$sql_query);
		$row=mysqli_fetch_array($result);
		?>
		<tbody>
		<tr>
		<td><input type="text" class="form-control" name="<?php echo "name".$row['ID']; ?>" value="<?php echo $row['NAME'] ?>"></td>
		<td><textarea class="form-control" name="<?php echo "address".$row['ID']; ?>" value=""><?php echo $row['ADDRESS'] ?></textarea></td>
		<td><textarea class="form-control" name="<?php echo "shipping_address".$row['ID']; ?>" value=""><?php echo $row['SHIPPING_ADDRESS'] ?></textarea></td>
        <td><input type="text" class="form-control" name="<?php echo "phone".$row['ID']; ?>" value="<?php echo $row['PHONE'] ?>"></td>
		<td><input type="text" class="form-control" name="<?php echo "email".$row['ID']; ?>" value="<?php echo $row['EMAIL'] ?>"></td>
		<td><input type="text" class="form-control" name="<?php echo "outstanding".$row['ID']; ?>" value="<?php echo "$".$row['OUTSTANDING'] ?>"></td>
		<td><input type="hidden" class="form-control" name="<?php echo $row['ID']; ?>" value="<?php echo $row['ID'] ?>"></td>
		</tr>
		</tbody>
	
<?php	

	}
	}
	
    }
	
	}
?>
</table>
<button type="submit" class="btn btn-primary pull-right">Save Changes</button>
</form>
</div>
</body>
</html>

