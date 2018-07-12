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
$counter=$_POST['Customers'];

if (is_numeric($counter))
{
	if($counter<1)
	{
		header('Location: Payment.php');
	}
}
else
{
	header('Location: Payment.php?status=505'); 
}	
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
	
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

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
<form class="col-md-12 center-block" action="Payment_Add_Process.php" method="POST">  
<input type="hidden" class="form-control" name="no" value="<?php echo $counter; ?>">
  <table class="table table-condensed">
    <thead>
      <tr>
		<th>No</th>
        <th>Date</th>
        <th>Customer</th>
		<th>Amount</th>
		<th>Remark</th>
      </tr>
    </thead>
	<?php
	for($x = 0; $x < $counter; $x++) {
	?>
    <tbody>
		<tr>
		<td><label><?php echo $x+1 ?></label></td>
		<td>
		<div>
        <input class="form-control" id="date" name="<?php echo "date".$x; ?>" placeholder="MM/DD/YYYY" type="text"/>
		</div>
		</td>
		<td>
			<select class="select form-control" id="select" name="<?php echo "customer".$x; ?>">
				<option selected disabled class="hideoption">SELECT CUSTOMER</option>
					<?php
							$sql_query="Select * from customer";
							$result=mysqli_query($conn,$sql_query);
							while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
					{
						?>
						<option value="<?php echo $row['NAME'] ?>"><?php echo $row['NAME'] ?></option>
					<?php
					}
					
					?>
				
				
			</select>
		</td>
		
        <td>
		<div class="input-group">
		<span class="input-group-addon">
        <i class="glyphicon glyphicon-usd"></i>
		</span>
		<input type="text" class="form-control" name="<?php echo "amount".$x; ?>" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
		</div>
		</td>
		<td><input type="text" class="form-control" name="<?php echo "remark".$x; ?>"></td>
		</tr>
	</tbody>
	<?php
	}
?>
</table>
<button type="submit" class="btn btn-primary pull-right">Submit</button>
</form>
</div>
<script>
    $(document).ready(function(){
      var date_input=$('input[id="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
</body>
</html>