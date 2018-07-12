<?php
 session_start();
 if (!isset($_SESSION["id"])) {
   header('Location: Index.php');
}
 ?>
<?php
	
	$OID=$_POST["OID"];
	include 'connect.php';
	$sql_query="select * from order_table where OID = $OID";
	$result=mysqli_query($conn,$sql_query);
	$COUNTER=1;
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<html>
<head>
	<title>Real Food</title>
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
		<a class="navbar-brand" href="http://www.thomsonfoods.com/" target="_blank"><b><i>RealFood</i></b></a>
	</div>
			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class = "nav navbar-nav navbar-right">
				<li><a target="_blank" href="Invoice.php?OID=<?php echo $OID ?>"><b>Invoice</b></a></li>
				<li><a target="_blank" href="Packaging_Slip.php?OID=<?php echo $OID ?>"><b>Packaging Slip</b></a></li>
				<li><a href="Order_Delete_Process.php?OID=<?php echo $OID ?>"><b>Delete Order</b></a></li>
				<li><a href="Order_Add.php"><b>Add Order</b></a></li>
				<li><a href="Order.php"><b>Order</b></a></li>
				<li><a href="Home.php"><b>Menu</b></a></li>
				<li><a href="Logout.php"><b>Logout</b></a></li>
				</ul>
			</div>
			</div>
			</nav>
<div class="container">
  <h2></h2>   
<div class="jumbotron text-center">  
  <table class="table table-condensed">
    <thead>
      <tr>
		<th></th>
		<th></th>
        <th>Order No</th>
        <th>Date</th>
        <th>Customer</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	
	?>
	<tr>
		<td></td>
		<td></td>
        <td><?php echo $row['OID'] ?></td>
		<td><?php echo $row['DATE'] ?></td>
        <td><?php echo $row['CUSTOMER'] ?></td>
	</tr>
	</tbody>
	
  </table>
	</div>
	<table class="table table-condensed">
    <thead>
      <tr>
		<th>No</th>
        <th>Item</th>
        <th>Unit Price</th>
        <th>Quantity</th>
		<th>Price</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$counter=1;
	$SUB_TOTAL=$row['UNIT_PRICE']*$row['QUANTITY'];
	$SALESTAX=$row['SALESTAX'];
	$ADJUSTMENT=$row['ADJUSTMENT'];
	?>
	<tr>
		<td><?php echo $counter; $counter++; ?></td>
		<td><?php echo $row['ITEM'] ?></td>
		<td><?php echo "$".$row['UNIT_PRICE'] ?></td>
		<td><?php echo $row['QUANTITY'] ?></td>
		<td><?php echo "$".$row['UNIT_PRICE'] * $row['QUANTITY'] ?></td>
	</tr>
		<?php
	
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	$SUB_TOTAL=$SUB_TOTAL+($row['UNIT_PRICE']*$row['QUANTITY']);
	
	?>	<tr>
		<td><?php echo $counter; $counter++; ?></td>
		<td><?php echo $row['ITEM'] ?></td>
		<td><?php echo "$".$row['UNIT_PRICE'] ?></td>
		<td><?php echo $row['QUANTITY'] ?></td>
		<td><?php echo "$".$row['UNIT_PRICE'] * $row['QUANTITY'] ?></td>
      </tr>
    <?php
}
$TAX=(($SUB_TOTAL*$SALESTAX)/100);
$TOTAL=$SUB_TOTAL+$TAX+$ADJUSTMENT;
?>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Sales Tax (<?php echo $SALESTAX."%" ?>)</td>
		<td><?php echo "$".$TAX ?></td>
    </tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Adjustment</td>
		<td><?php echo "$".$ADJUSTMENT ?></td>
    </tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Total</td>
		<td><?php echo "$".$TOTAL ?></td>
    </tr>
    </tbody>
	
  </table>
</div>


</body>
</html>
