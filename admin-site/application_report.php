
<?php
define('FPDF_FONTPATH','font/');
require("../../../fpdf/fpdf.php");

class PDF extends FPDF
{
//Page header
function Header()
{
    //Logo
    //$this->Image('log.jpg',10,10,20);
	 //$this->Image('logo1.jpg',180,10,25);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(80);
    //
    $this->Cell(30,10,'APPLICATION REPORT',0,0,'C');
    //Line break
    $this->Ln(20);
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

//$pdf = new FPDF('p','cm','A4');
$pdf->Open();
 $pdf->AliasNbPages();
$pdf->AddPage();
$pdf -> SetMargins(10,10,10,10);
$pdf -> Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,0.7,'District:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(30,0.7,'Phiri');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,0.7,'firstname:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(30.5,0.7,'Chikumbutso');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,0.7,'Initials:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(20,0.7,'C.F');
$pdf -> Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,0.7,'Date of birth:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(20,0.7,'34-89-89');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,0.7,'Sex:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(20,0.7,'male');
$pdf -> Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,0.7,'Nationality:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(20,0.7,'malawian');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,0.7,'home district:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(20.5,0.7,'Chikwawa');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,0.7,'T/A:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(20,0.7,'Kasisi');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,0.7,'village:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(20,0.7,'mbendelana');
$pdf -> Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,0.7,'contact address:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(20,0.7,'');
$pdf -> Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,0.7,'Telephone:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(20,0.7,'01655008');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,0.7,'mobile:  ');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(20,0.7,'0992227931');
$pdf->Output();
?> 