<?php

	require('fpdf\fpdf.php');
	session_start();
	$OID=$_GET["OID"];
	include 'connect.php';
	$sql_query="select * from payment where PID = $PID";
	$result=mysqli_query($conn,$sql_query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$SALESTAX=$row['SALESTAX'];
	$ADJUSTMENT=$row['ADJUSTMENT'];
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
$date = date('Y-m-d');
$pdf->SetFont('Times','B',14);

$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'REAL THOMSON FOODS INC.',0,0);
$pdf->cell(25,5,'INVOICE',0,1);
$pdf->SetFont('Times','',12);
$pdf->cell(140,5,'22 Spackman Blvd',0,0);
$pdf->cell(24,5,'Customer',0,0);
$pdf->cell(30,5,': '.$row['CUSTOMER'],0,1);
$pdf->cell(140,5,'St. Thomas, ON',0,0);
$pdf->cell(24,5,'Order',0,0);
$pdf->cell(30,5,': '.$row['OID'],0,1);

$pdf->cell(140,5,'N5P 4A3',0,0);
$pdf->cell(24,5,'Order Date',0,0);
$pdf->cell(30,5,': '.$row['DATE'],0,1);


$pdf->cell(140,5,'Phone: (519) 476-0682',0,1);


$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(37,5,'Invoice Date: '.$date,0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->SetFont('Times','B',12);
$pdf->cell(3,5,'',0,0);
$pdf->cell(37,5,'NO',1,0);
$pdf->cell(37,5,'ITEM',1,0);
$pdf->cell(37,5,'UNIT PRICE',1,0);
$pdf->cell(37,5,'QUANTITY',1,0);
$pdf->cell(37,5,'PRICE',1,1);
$pdf->SetFont('Times','',12);

$sql_query="select * from order_table where OID = $OID";
$result=mysqli_query($conn,$sql_query);
$SUBTOTAL=0;
$COUNTER=1;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
$pdf->cell(3,5,'',0,0);
$pdf->cell(37,5,$COUNTER++,1,0);
$pdf->cell(37,5,$row['ITEM'],1,0);
$pdf->cell(37,5,'$'.$row['UNIT_PRICE'],1,0);
$pdf->cell(37,5,$row['QUANTITY'],1,0);
$pdf->cell(37,5,'$'.$row['UNIT_PRICE']*$row['QUANTITY'],1,1);
$SUBTOTAL=$SUBTOTAL+($row['UNIT_PRICE']*$row['QUANTITY']);
}
$TAX=($SUBTOTAL*$SALESTAX)/100;
$TOTAL=$SUBTOTAL+$TAX+$ADJUSTMENT;

for($i=0;$i<=20;$i++)
{
$pdf->cell(3,5,'',0,0);
$pdf->cell(37,5,'',1,0);
$pdf->cell(37,5,'',1,0);
$pdf->cell(37,5,'',1,0);
$pdf->cell(37,5,'',1,0);
$pdf->cell(37,5,'',1,1);	
}

$pdf->cell(3,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'Tax('.$SALESTAX.'%)',1,0);
$pdf->cell(37,5,'$'.$TAX,1,1);
$pdf->cell(3,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'Adjustment',1,0);
$pdf->cell(37,5,'$'.$ADJUSTMENT,1,1);
$pdf->SetFont('Times','B',12);
$pdf->cell(3,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'Invoice Total',1,0);
$pdf->cell(37,5,'$'.$TOTAL,1,1);
$pdf->cell(3,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'Previously Billed',1,0);
$pdf->cell(37,5,'$0',1,1);
$pdf->cell(3,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'Total Outstanding',1,0);
$pdf->cell(37,5,'$'.$TOTAL,1,1);



$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);

$pdf->cell(3,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);

$pdf->Output();

?>