<?php
include("sql.php");
require('fpdf.php');
session_start();
class PDF extends FPDF
{
	function BasicTable($header, $data)
	{
		// Header
		foreach($header as $col)
			$this->Cell(22,7,$col,1);
		$this->Ln();
		// Data
		foreach($data as $row)
		{
			foreach($row as $col)
				$this->Cell(22,6,$col,1);
			$this->Ln();
		}
	}
}

function print_array($aArray) {
// Print a nicely formatted array representation:	
  echo '<pre>';
  echo 'asdasd';
  print_r($aArray);
  echo '</pre>';
}
$sql = mysql_query("select * from lead"); // Start our query of the database
$numberFields = mysql_num_fields($sql); // Find out how many fields we are fetching

if($numberFields) 
{ // Check if we need to output anything
	$keys = array('adate');
	$header = array('S.No.');
	//$headers = join(',', $head)."\n"; // Make our first row in the CSV
	
	$i=0;
	while($info = mysql_fetch_object($sql)) 
	{
		$j=0;
		$rowfl[$j] = $j+1;
		$j++;
		foreach($keys as $fieldName)
		{ // Loop through the array of headers as we fetch the data
			$rowfl[$j] = $info->$fieldName;
			$j++;
		} // End loop
		$data[$i]= $rowfl; // Create a new row of data and append it to the last row
		$i++;
	}
	
	/*echo "header :<br>";
	echo '<pre>';
	print_r($header);
	echo '</pre>';
	
	echo "<br><Br>data :<br>";
	echo '<pre>';
	print_r($data);	
	echo '</pre>';*/
	
	$pdf = new PDF();
	
	$pdf->SetFont('Arial','',7);
	$pdf->AddPage();
	//$pdf->print_array();
	$pdf->Text('5','5','Total amount you owing under Account number : '.$_SESSION['accno'].' ','');
	$pdf->BasicTable($header,$data);
	
	$pdf->Output();
	
}
?>
