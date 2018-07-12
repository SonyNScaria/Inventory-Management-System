<?php
 session_start();
 if (!isset($_SESSION["id"])) {
   header('Location: Index.php');
}
 ?>
<?php
if($_GET)
{
if($_GET['status']==505)
{
echo '<script type="text/javascript">
          window.onload = function () { alert(" Invalid no of items ! "); }
</script>';
}
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
	<script>
		var a = new Array();
		$(function(){
			$('#parent').on('change',function(){
			$('.child').prop('checked',$(this).prop('checked'));
			});
  
			});
	</script>
	<script type="text/javascript">
			function myJavascriptFunctionEdit() 
	{ 
			window.location.href = "Payment_Edit.php?name=" + a;
     
	}
	function myJavascriptFunctionDelete() 
	{ 
			window.location.href = "Payment_Delete.php?name=" + a;
     
	}
	function myJavascriptFunctionPrint() 
	{ 
			window.location.href = "Payment_Reciept.php?PID=" + a;
     
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
				<li><a href="#" data-toggle="modal" data-target="#myModal"><b>Add Payment</b></a></li>
				<li><a href="#" onclick="myJavascriptFunctionEdit();"><b>Edit Payment</b></a></li>
				<li><a href="#" onclick="myJavascriptFunctionDelete();"><b>Delete Payment</b></a></li>
				<li><a href="Export_Excel_Payment.php"><b>Export to Excel</b></a></li>
				<li><a target="_blank" href="Export_PDF_Payment.php"><b>Export to PDF</b></a></li>
				<li><a href="Home.php"><b>Menu</b></a></li>
				<li><a href="Logout.php"><b>Logout</b></a></li>
				</ul>
			</div>
			</div>
			</nav>
			<input type="hidden" id="refreshed" value="no">
			<script type="text/javascript">
	onload=function(){
	var e=document.getElementById("refreshed");
	if(e.value=="no")e.value="yes";
	else{e.value="no";location.reload();}
	}
</script>
<div class="container">
  <h2></h2>     
  <table class="table table-condensed">
    <thead>
      <tr>
		<th></th>
		<th>No</th>
        <th>Date</th>
        <th>Customer</th>
		<th>Amount</th>
		<th>Remark</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	include 'connect.php';
	$sql_query="Select * from payment";
	$result=mysqli_query($conn,$sql_query);
	$COUNTER=1;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	
	?>	
      <tr>
		<td><input type="checkbox"  name="<?php echo $row['PID'] ?>" class="child" value="<?php echo $row['PID'] ?>" id="my_<?php echo $row['PID'] ?>" onchange="myFunction(<?php echo $row['PID'] ?>)"></td>
		<td><?php echo $COUNTER; $COUNTER++ ?></td>
		<td><?php echo $row['DATE'] ?></td>
		<td><?php echo $row['CUSTOMER'] ?></td>
		<td><?php echo "$".$row['AMOUNT'] ?></td>
		<td><?php echo $row['REMARK'] ?></td>
		</tr>
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
          <h4 class="modal-title"><b>Add Payments#</b></h4>
        </div>
        <div class="modal-body">
          <form class="col-md-12 center-block" method="POST" action="Payment_A dd.php">
					<div class="form-group">
						<input type="text" class="form-control" name="Customers" placeholder="Enter number of payments: " onkeypress='return event.charCode >= 49 && event.charCode <= 57'>
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
