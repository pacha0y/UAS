<?php 
include_once('../functions/functions.inc.php');
	
define('FPDF_FONTPATH','font/');
require("../fpdf/fpdf.php");

$select_district = new System();
$select_district->getDistricts();
$districts = $_SESSION['district'];
$space = new System();								

class PDF extends FPDF
{
//Page header
function Header()
{
    //Logo
    $this->Image('log.jpg',10,10,20);
	 $this->Image('logo1.jpg',180,10,25);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(80);
    //
    $this->Cell(30,10,'Application Report',0,0,'C');
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
		  $headers = array('District','Population','Applicants','Space');
   		  $width=array(45,40,40,70);
    	  for($i=0;$i<4;$i++)
		  {
        	$pdf->Cell($width[$i],7,$headers[$i],1,0,'C');
		  }
    	  $pdf->Ln();
		  $pdf -> SetFont('helvetica','','11');
		  
		 
									
		 foreach($districts as $district)
		  {       
			    
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$y1 = $pdf->GetY();
        			$pdf ->MultiCell($width[0],7,$district['district'], 'LTRB');
					$y2 = $pdf -> GetY();
		            $yh = $y2 - $y1;
					$pdf -> SetXY($x+$width[0], $pdf->GetY()-$yh);
					$pdf->Cell($width[1],$yh,$district['population'],'LTRB'); 
					$pdf->Cell($width[2],$yh,$district['total'],'LTRB');
					
					$space->getSpace($district['population']);
        			$pdf->Cell($width[3],$yh,$_SESSION['distr_space'],'LTRB');
					$pdf->Ln();
        
			
		  }
		  $pdf -> output();
		

?>