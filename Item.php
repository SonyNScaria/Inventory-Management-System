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
			window.location.href = "Item_Edit.php?name=" + a;
     
	}
	function myJavascriptFunctionDelete() 
	{ 
			window.location.href = "Item_Delete.php?name=" + a;
     
	}
	</script>
	<style>
		body, html {
		height: 100%;
		margin: 0;
	}

.bg {
    /* The image used */
    background-image: url("backg_1.jpg");

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
				<li><a href="#" data-toggle="modal" data-target="#myModal"><b>Add Product</b></a></li>
				<li><a href="#" onclick="myJavascriptFunctionEdit();"><b>Edit Product</b></a></li>
				<li><a href="#" onclick="myJavascriptFunctionDelete();"><b>Delete Product</b></a></li>
				<li><a target="_blank" href="Export_Excel_Product.php"><b>Export to Excel</b></a></li>
				<li><a target="_blank" href="Export_PDF_Product.php"><b>Export to PDF</b></a></li>
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
        <th>Name</th>
        <th>Description</th>
		<th>Unit Weight</th>
		<th>Unit Price</th>
		<th>Units Sold</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	$sql_query="Select * from item";
	$result=mysqli_query($conn,$sql_query);
	$COUNTER=1;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	
	?>	
      <tr>
		<td><input type="checkbox"  name="<?php echo $row['ID'] ?>" class="child" value="<?php echo $row['ID'] ?>" id="my_<?php echo $row['ID'] ?>" onchange="myFunction(<?php echo $row['ID'] ?>)"></td>
        <td><?php echo $COUNTER; $COUNTER++ ?></td>
        <td><?php echo $row['NAME'] ?></td>
		<td><?php echo $row['DESCRIPTION'] ?></td>
        <td><?php echo $row['UNIT_WEIGHT']." grams" ?></td>
		<td><?php echo "$".$row['UNIT_PRICE'] ?></td>
		<td><?php echo $row['UNITS_SOLD'] ?></td>
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
          <h4 class="modal-title"><b>Add Products#</b></h4>
        </div>
        <div class="modal-body">
          <form class="col-md-12 center-block" method="POST" action="Item_Add.php">
					<div class="form-group">
						<input type="text" class="form-control" name="items" placeholder="Enter number of items ( Example: 5 )" onkeypress='return event.charCode >= 49 && event.charCode <= 57'>
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
