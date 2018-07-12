<html>
<body>

<div class="container">
  <h2></h2>     
  <?php $output ='
  <table class="table table-condensed" bordered="1">
      <tr>
        <th>NO</th>
        <th>NAME</th>
        <th>DESCRIPTION</th>
		<th>UNIT_WEIGHT</th>
		<th>UNIT_PRICE</th>
		<th>UNITS_SOLD</th>
      </tr>'; ?>
    
	
	<?php
	include 'connect.php';
	$sql_query="Select * from item";
	$result=mysqli_query($conn,$sql_query);
	$COUNTER=1;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	
	?>	
	<?php $output .='
      <tr>
        <td>'.$COUNTER.'  </td>
        <td>'.$row['NAME'].'</td>
		<td>'.$row['DESCRIPTION'].'</td>
        <td>'.$row['UNIT_WEIGHT'].'</td>
		<td>'.'$'.$row['UNIT_PRICE'].'</td>
		<td>'.$row['UNITS_SOLD'].'</td>
      </tr>';
	  ?>
	  
    <?php
	$COUNTER++;
}
?>
  <?php $output .='</table>'; 
  $date = date('Y-m-d');
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Product_Details_'.$date.'.xls');
  echo $output;
  ?>
</div>


</html>
