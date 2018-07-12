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
<html>
<head>
	<title><?php echo $row_admin['NAME'] ?></title>
	<meta name="viewport" content="width=decive-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/mycss.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
			function clicka() 
	{ 
			 document.getElementById("myCheck").click();
     
	}
	</script>
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
				<li><a href="Order_Add.php"><b>Add Order</b></a></li>
				<li><a href="Home.php"><b>Menu</b></a></li>
				<li><a href="Logout.php"><b>Logout</b></a></li>
				</ul>
			</div>
			</div>
			</nav>
<div class="container">
  <h2></h2>     
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Order No</th>
        <th>Date</th>
        <th>Customer</th>
		<th>Amount</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	$sql_query="select OID,CUSTOMER,DATE,sum(UNIT_PRICE) AS UNIT_PRICE, SUM(QUANTITY) AS QUANTITY, SALESTAX,ADJUSTMENT from order_table group by OID";
	$result=mysqli_query($conn,$sql_query);
	$COUNTER=1;
	
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	?>	
	<form method="POST" action="Item_Details.php">
      <tr>
        <td><?php echo $row['OID'] ?><input type="hidden" name="OID" value="<?php echo $row['OID'] ?>"/></td>
		<?php
		$sql_query_INNER="select * from order_table where OID = ".$row['OID'];
		$result_INNER=mysqli_query($conn,$sql_query_INNER);
		$SUB_TOTAL=0;
			while ($row_INNER = mysqli_fetch_array($result_INNER, MYSQLI_ASSOC)) 
	{
			$UNIT_PRICE=$row_INNER['UNIT_PRICE'];
			$QUANTITY=$row_INNER['QUANTITY'];
			$SALESTAX=$row_INNER['SALESTAX'];
			$ADJUSTMENT=$row_INNER['ADJUSTMENT'];
			$SUB_TOTAL=($QUANTITY*$UNIT_PRICE)+$SUB_TOTAL;
			
	}
			$TAX=($SUB_TOTAL*$SALESTAX)/100;
			$TOTAL=$SUB_TOTAL+$TAX+$ADJUSTMENT;
		?>
		<td><?php echo $row['DATE'] ?></td>
        <td><?php echo $row['CUSTOMER'] ?></td>
		<td><?php echo "$".number_format($TOTAL,2) ?></td>
		<td><button type="Submit" class="btn">Open</button></td>
      </tr>
	 </form> 
    <?php
}
?>
    </tbody>
	
  </table>
</div>
<script>
function myFunction(abc) { 

var name='my_'+abc;
if(document.getElementById(name).checked)
{
	  a[abc]=abc+',';
}
if(document.getElementById(name).unchecked)
{
	  a[abc]=0;
}
    }
</script>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Add Products</b></h4>
		  <?php echo "hi"; 
		  echo $_POST["country"]
		  ?>
        </div>
        <div class="modal-body">
          <form class="col-md-12 center-block" method="POST" action="item_add.php">
					<div class="form-group">
						<input type="text" class="form-control" name="items" placeholder="Enter number of items ( Example: 5 )" value="<?php echo $_POST["country"] ?>">
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
</body>
</html>
