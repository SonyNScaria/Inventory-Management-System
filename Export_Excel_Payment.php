<html><body>

<div class="container">
  <h2></h2>     
  <?php $output ='
  <table class="table table-condensed" bordered="1">
      <tr>
        <th>NO</th>
        <th>CUSTOMER</th>
        <th>DATE</th>
		<th>AMOUNT</th>
		<th>REMARK</th>
      </tr>'; ?>
    
	
	<?php
	include 'connect.php';
	$sql_query="Select * from payment";
	$result=mysqli_query($conn,$sql_query);
	$COUNTER=1;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	
	?>	
	<?php $output .='
      <tr>
        <td>'.$COUNTER.'  </td>
        <td>'.$row['CUSTOMER'].'</td>
		<td>'.$row['DATE'].'</td>
        <td>'.'$'.$row['AMOUNT'].'</td>
		<td>'.$row['REMARK'].'</td>
      </tr>';
	  ?>
	  
    <?php
	$COUNTER++;
}
?>
  <?php $output .='</table>'; 
  $date = date('Y-m-d');
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Payment_Details_'.$date.'.xls');
  echo $output;
  ?>
</div>


</html>
