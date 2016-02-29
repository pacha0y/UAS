<?php 
include_once('../functions/functions.inc.php');
	
define('FPDF_FONTPATH','font/');
require("../fpdf/fpdf.php");

$select = new selection();
$select->getSelectedStudents();

class PDF extends FPDF
{
//Page header
function Header()
{
    //Logo
    $this->Image('logo1.jpg',10,10,30);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(80);
    //
    $this->Cell(30,10,'List Of Selected Students',0,0,'C');
    //Line break
    $this->Ln(30);
}

//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->Open();
 $pdf->AliasNbPages();
$pdf->AddPage();
$pdf -> SetMargins(10,10,10,10);

		  $pdf -> SetFont('helvetica','B','12');
		  $headers = array('examination number','name','previous school','program');
   		  $width=array(45,40,40,70);
    	  for($i=0;$i<4;$i++)
		  {
        	$pdf->Cell($width[$i],7,$headers[$i],1,0,'C');
		  }
    	  $pdf->Ln();
		  $pdf -> SetFont('helvetica','','11');
		  if(isset($_SESSION['students'])) {
		  foreach($_SESSION['students'] as $list )
		  {       
			    
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$y1 = $pdf->GetY();
        			$pdf ->MultiCell($width[0],7,$list['student_id'], 'LTRB');
					$y2 = $pdf -> GetY();
		            $yh = $y2 - $y1;
					$pdf -> SetXY($x+$width[0], $pdf->GetY()-$yh);
					$pdf->Cell($width[1],$yh,$list['firstname'],'LTRB'); 
					$pdf->Cell($width[2],$yh,$list['previous_school'],'LTRB');
        			$pdf->Cell($width[3],$yh,$list['programme'],'LTRB');
					$pdf->Ln();
        
			
		  }
}
		  $pdf -> output();
		

?>