<html>
<body>

<div class="container">
  <h2></h2>     
  <?php $output ='
  <table class="table table-condensed" bordered="1">
      <tr>
        <th>NO</th>
        <th>NAME</th>
        <th>ADDRESS</th>
		<th>PHONE</th>
		<th>EMAIL</th>
		<th>OUTSTANDING</th>
      </tr>'; ?>
    
	
	<?php
	include 'connect.php';
	$sql_query="Select * from customer";
	$result=mysqli_query($conn,$sql_query);
	$COUNTER=1;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	
	?>	
	<?php $output .='
      <tr>
        <td>'.$COUNTER.'  </td>
        <td>'.$row['NAME'].'</td>
		<td>'.$row['ADDRESS'].'</td>
        <td>'.$row['PHONE'].'</td>
		<td>'.$row['EMAIL'].'</td>
		<td>'.'$'.$row['OUTSTANDING'].'</td>
      </tr>';
	  ?>
	  
    <?php
	$COUNTER++;
}
?>
  <?php $output .='</table>'; 
  $date = date('Y-m-d');
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Customer_Details_'.$date.'.xls');
  echo $output;
  ?>
</div>


</html>
