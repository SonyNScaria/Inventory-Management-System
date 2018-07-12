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
<form class="col-md-12 center-block" action="Payment_Edit_Process.php" method="POST">  
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Date</th>
        <th>Customer</th>
		<th>Amount</th>
		<th>Remark</th>
      </tr>
    </thead>
	<?php
	if(empty($temp_Arr))
{
	$sql_query="Select * from payment";
	$result=mysqli_query($conn,$sql_query);
	$COUNTER=1;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	
	?>	
     <tbody>
		<tr>
		<td>
		<div>
        <input class="form-control" id="date" name="<?php echo "date".$row['PID']; ?>" value="<?php echo $row['DATE'] ?>" placeholder="MM/DD/YYYY" type="text"/>
		</div>
		</td>
		<td>
			<select class="select form-control" id="select" name="<?php echo "customer".$row['PID']; ?>">

				<?php
							$sql_query_cus="Select * from customer";
							$result_cus=mysqli_query($conn,$sql_query_cus);
							while ($row_cus = mysqli_fetch_array($result_cus, MYSQLI_ASSOC)) 
					{
							if($row_cus['NAME']==$row['CUSTOMER'])
							{
								?>
								<option selected value="<?php echo $row_cus['NAME'] ?>"><?php echo $row_cus['NAME'] ?></option>
								<?php
								continue;
							}
						?>
						<option value="<?php echo $row_cus['NAME'] ?>"><?php echo $row_cus['NAME'] ?></option>
						<?php
					}
						
					?>
			
			</select>
		</td>
        <td><input type="text" class="form-control" name="<?php echo "amount".$row['PID']; ?>" value="<?php echo $row['AMOUNT'] ?>" onkeypress='return event.charCode >= 45 && event.charCode <= 57'></td>
		<td><input type="text" class="form-control" name="<?php echo "remark".$row['PID']; ?>" value="<?php echo $row['REMARK'] ?>"></td>
		<td><input type="hidden" class="form-control" name="<?php echo $row['PID']; ?>" value="<?php echo $row['PID'] ?>"></td>
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
		$sql_query="Select * from payment where PID=$bla";
		$result=mysqli_query($conn,$sql_query);
		$row=mysqli_fetch_array($result);
		?>
		<tbody>
		<tr>
		<td>
		<div>
        <input class="form-control" id="date" name="<?php echo "date".$row['PID']; ?>" value="<?php echo $row['DATE'] ?>" placeholder="MM/DD/YYYY" type="text"/>
		</div>
		</td>
		<td>
			<select class="select form-control" id="select" name="<?php echo "customer".$row['PID']; ?>">
					<?php
							$sql_query="Select * from customer";
							$result=mysqli_query($conn,$sql_query);
							while ($row_cus = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
					{
							if($row_cus['NAME']==$row['CUSTOMER'])
							{
								?>
								<option selected value="<?php echo $row_cus['NAME'] ?>"><?php echo $row_cus['NAME'] ?></option>
								<?php
								continue;
							}
						?>
						<option value="<?php echo $row_cus['NAME'] ?>"><?php echo $row_cus['NAME'] ?></option>
						<?php
					}
						
					?>
					</select>
		</td>
        <td><input type="text" class="form-control" name="<?php echo "amount".$row['PID']; ?>" value="<?php echo $row['AMOUNT'] ?>"></td>
		<td><input type="text" class="form-control" name="<?php echo "remark".$row['PID']; ?>" value="<?php echo $row['REMARK'] ?>"></td>
		<td><input type="hidden" class="form-control" name="<?php echo $row['PID']; ?>" value="<?php echo $row['PID'] ?>"></td>
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