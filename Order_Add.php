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
	
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	<script>
            
            function addRow()
            {
				
                // get input values
                var fname = document.getElementById('fname').value;
                 var lname = document.getElementById('lname').value;
                  var age = document.getElementById('age').value;
				  var price = document.getElementById('price').value;
                  if(fname=='ITEM')
				  {
					  alert("Select an item !")
					  return;
				  }
                  // get the html table
                  // 0 = the first table
                  var table = document.getElementsByTagName('table')[1];
				  var x = document.getElementById("item_table").rows.length;
                  x=x-3;
                  // add new empty row to the table
                  // 0 = in the top 
                  // table.rows.length = the end
                  // table.rows.length/2+1 = the center
                  var newRow = table.insertRow(x);
                  
                  // add cells to the row
                  var cel1 = newRow.insertCell(0);
                  var cel2 = newRow.insertCell(1);
                  var cel3 = newRow.insertCell(2);
				  var cel4 = newRow.insertCell(3);
				  var cel5 = newRow.insertCell(4);
				  var cel6 = newRow.insertCell(5);
				  var cel7 = newRow.insertCell(6);
				  var cel8 = newRow.insertCell(7);
				  var cel9 = newRow.insertCell(8);
				  var cel10 = newRow.insertCell(9);
                  
                  // add values to the cells
				  cel1.innerHTML = x.toString();
                  cel2.innerHTML = fname.toString();
                  cel3.innerHTML = lname.toString();
                  cel4.innerHTML = age.toString();
				  cel5.innerHTML = price.toString();
				  cel6.innerHTML = '<a onclick="SomeDeleteRowFunction(this)">Delete</a>';
				  cel7.innerHTML = '<input type="hidden" name="item[]" value="'+fname+'"/>';
				  cel8.innerHTML = '<input type="hidden" name="unit_price[]" value="'+lname+'"/>';
				  cel9.innerHTML = '<input type="hidden" name="quantity[]" value="'+age+'"/>';
				  cel10.innerHTML = '<input type="hidden" name="price[]" value="'+price+'"/>';
				  document.getElementById("myCheck").click();
            }
            
        </script>
			<script type="text/javascript">
				function populate(s1)
			{
				document.getElementById('age').value=0;
				document.getElementById('price').value=0;
				
				var s1=document.getElementById(s1);
					<?php
							include 'connect.php';
							$sql_query_count="Select COUNT(*) as COUNT from item";
							$result=mysqli_query($conn,$sql_query_count);
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					?>

							var bool_count = "<?php echo $row['COUNT'] ?>";
							var NAME = new Array();
							var UNIT_PRICE = new Array(); 
							var counter=0;
					<?php
							$sql_query="Select * from item";
							$result=mysqli_query($conn,$sql_query);
								while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
						{
					?>
							NAME[counter]="<?php echo $row['NAME'] ?>";
							UNIT_PRICE[counter]="<?php echo $row['UNIT_PRICE'] ?>";
							counter++;
					<?php
						}
					?>
for(var i=0;i<bool_count;i++)
{
	
	if(NAME[i]==s1.value)
	{
		document.getElementById('lname').value=UNIT_PRICE[i];
	}
	
}

}
	
</script>
<script type="text/javascript">
function calc(s1)
	{
		var s1=document.getElementById(s1);
		var total = s1.value * document.getElementById('lname').value ;
		document.getElementById('price').value=total;
		
	}
</script>
<script type="text/javascript">
function val()
	{
		var s1=document.getElementById('customer').value;
		var s2=document.getElementById('date').value;
		if(s1=='CUSTOMER')
		{
			alert("Select a customer !")
			return false;
		}		
		if(!s2)
			{
			alert("Select a date !")
			return false;
		}		
			
  }
	
</script>

<script>
    function SomeDeleteRowFunction(o) {
     //no clue what to put here?
     var p=o.parentNode.parentNode;
         p.parentNode.removeChild(p);
		 document.getElementById("myCheck").click();
    }
    </script>
	<script>
	function myFunction() {
    var x = document.getElementById("item_table").rows.length;
	var z=0;
	var sales_tax=0;
	for (var i=0;i<x-4; i++)
	{
		var y = parseInt(document.getElementById("item_table").rows[i+1].cells.item(4).innerHTML);
		z=z+y;
	}
	if(document.getElementById('Sales_Tax').value==""|| document.getElementById('Sales_Tax').value==undefined)
	{
		sales_tax=0;
	}
	else
	{
	sales_tax=parseInt(document.getElementById('Sales_Tax').value);
	}
	sales_tax=z*(sales_tax/100);
	z=z+sales_tax;
	if(document.getElementById('adjustment').value==""|| document.getElementById('adjustment').value==undefined)
	{
		
	}
	else
	{
		z=z+parseInt(document.getElementById('adjustment').value);
	}
	z=z.toFixed(2);	
	document.getElementById('Total').value = z;
	document.getElementById('val').value = z;
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
				<li><a href="item.php"><b>Product</b></a></li>
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
<form class="col-md-12 center-block" action="Order_Add_Process.php" method="POST" onsubmit="return val();">  
<input type="hidden" class="form-control" name="no" value="<?php echo $counter; ?>">
<div class="jumbotron text-center">
  <table class="table table-condensed">
    <thead>
      <tr>
		<th>Date</th>
        <th><input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/></th>
        <th></th>
		<th>Customer</th>
		<th><select class="select form-control" id="customer" name="customer">
				<option selected disabled class="hideoption">CUSTOMER</option>
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
			</select></th>
      </tr>
	  <tr>
        <th>Item</th>
        <th>Unit Price</th>
		<th>Quantity</th>
		<th>Price</th>
      </tr>
	  <tr>
		<th>
			<select class="select form-control" id="fname" name="<?php echo "item".$x; ?>" onchange="populate(this.id)">
				<option selected disabled class="hideoption">ITEM</option>
					<?php
							$sql_query="Select * from item";
							$result=mysqli_query($conn,$sql_query);
							while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
					{
						?>
						<option value="<?php echo $row['NAME'] ?>"><?php echo $row['NAME'] ?></option>
					<?php
					}
					
					?>
				
				
			</select>
		</th>
        <th><input type="text" class="form-control" name="lname" id="lname" placeholder="Unit Price" readonly /></th>
        <th>
			<select class="select form-control" id="age" name="<?php echo "quantity".$x; ?>" onchange="calc(this.id)">
				<option selected disabled class="hideoption">QUANTITY</option>
							<?php
							for($i=0;$i<=1000;$i++)
					{
						?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
					<?php
					}
					
					?>
				
				
			</select>
		</th>
		 <th><input type="text" class="form-control" name="price" id="price" placeholder="Price" readonly /></th>
		<th><button type="button" class="btn btn-default" onclick="addRow();">Add Item</button></th>
		<th><button type="button" class="btn btn-default" id="myCheck" onclick="myFunction();">Calculate</button></th>
      </tr>
	  </thead>
	  </table>
	  </div>
	  <table class="table table-condensed" id="item_table">
    <thead>
      <tr>
		<th>No</th>
        <th>Item</th>
        <th>Unit Price</th>
		<th>Quantity</th>
		<th>Total Price</th>
		<th><button type="button" class="btn pull-right" onClick="window.location.reload()">Reset</button></th>
      </tr>
	 
	  <tr>
		<th></th>
        <th></th>
        <th></th>
		<th>Adjustment</th>
		<th><input type="text" class="form-control" name="adjustment" id="adjustment" onchange="myFunction();" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></th>
		<th></th>
      </tr>
	  <tr>
		<th></th>
        <th></th>
        <th></th>
		<th>Sales Tax ( % ) </th>
		<th><input type="text" class="form-control" name="Sales_Tax" id="Sales_Tax" value="13" onchange="myFunction();" onkeypress='return event.charCode >= 46 && event.charCode <= 57'></th>
		<th><a id="val" name="val" href="#"></a><br></th>
      </tr>
	  <tr>
		<th></th>
        <th></th>
        <th></th>
		<th>Total($)</th>
		<th><input type="text" class="form-control" name="Total" id="Total" readonly></th>
		<th></th>
      </tr>
	  
    </thead>
	
    <tbody>
		
	</tbody>
	
</table>    
<button type="submit" class="btn btn-primary pull-right" >Submit</button>
</form>
</div>
<script>
    $(document).ready(function(){
      var date_input=$('input[id="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
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