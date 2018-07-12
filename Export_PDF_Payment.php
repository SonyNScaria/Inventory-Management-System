<?php
	require('fpdf/fpdf.php');
	session_start();
	include 'connect.php';
	
	
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
$date = date('Y-m-d');
$pdf->SetFont('Times','B',14);

$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'REAL THOMSON FOODS INC.',0,1);
$pdf->SetFont('Times','',12);
$pdf->cell(140,5,'22 Spackman Blvd',0,1);
$pdf->cell(140,5,'St. Thomas, ON',0,1);
$pdf->cell(140,5,'N5P 4A3',0,1);



$pdf->cell(140,5,'Phone: (519) 476-0682',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);

$pdf->cell(140,5,'',0,1);
$pdf->cell(37,5,'Date: '.$date,0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->cell(70,5,'',0,0);
$pdf->SetFont('Times','B',14);
$pdf->cell(50,5,'PAYMENT DETAILS',0,1);
$pdf->cell(70,5,'',0,0);
$pdf->SetFont('Times','B',14);
$pdf->cell(50,5,'------------------------------',0,1);
$pdf->SetFont('Times','',12);
$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);
$pdf->SetFont('Times','B',12);
$pdf->cell(10,5,'',0,0);
$pdf->cell(20,5,'ID',1,0);
$pdf->cell(50,5,'CUSTOMER',1,0);
$pdf->cell(50,5,'DATE',1,0);
$pdf->cell(50,5,'AMOUNT',1,1);
$pdf->SetFont('Times','',12);

$sql_query="select * from payment";
$result=mysqli_query($conn,$sql_query);
$SUBTOTAL=0;
$COUNTER=1;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
$pdf->cell(10,5,'',0,0);
$pdf->cell(20,5,$COUNTER++,1,0);
$pdf->cell(50,5,$row['CUSTOMER'],1,0);
$pdf->cell(50,5,$row['DATE'],1,0);
$pdf->cell(50,5,"$".$row['AMOUNT'],1,1);
}


for($i=$COUNTER;$i<=20;$i++)
{
$pdf->cell(10,5,'',0,0);
$pdf->cell(20,5,'',1,0);
$pdf->cell(50,5,'',1,0);
$pdf->cell(50,5,'',1,0);
$pdf->cell(50,5,'',1,1);
}




$pdf->cell(140,5,'',0,1);
$pdf->cell(140,5,'',0,1);

$pdf->cell(3,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);
$pdf->cell(37,5,'',0,0);

$pdf->Output();

?>