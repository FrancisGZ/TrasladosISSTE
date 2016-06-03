<?php
session_start();
require('fpdf.php');


class PDF extends FPDF
{

//Page header
function Header()
{
    //Logo
    $this->Image('bannertexto.png',50 ,10,180);

    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(80);
    //Title
    //$this->Cell(70,10,'Reporte',1,0,'C');
    //Line break
    $this->Ln(20);
}

//Page footers
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}


//Colored table
function FancyTable($header)
{
    //Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    //Header
    $w=array(10,14,14,14,14,14,10,24,14,14,26,26,8,26,32);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);
    $this->Ln();
    //Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    //Data
    $fill=0;


$conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or

      die ("Fallo en el establecimiento de la conexión");


   $result = pg_query ($conexion,"SELECT * from reportetransporte  where nomunidad='$_SESSION[umf]' order by fecha" )

             or die("Error en la consulta SQL");



   
	while ($row= pg_fetch_array ($result))
    {
        $this->Cell($w[0],6,utf8_decode($row[0]),'LR',0,'L',$fill);
        $this->Cell($w[1],6,utf8_decode($row[1]),'LR',0,'L',$fill);
	$this->Cell($w[2],6,utf8_decode($row[2]),'LR',0,'L',$fill);
        $this->Cell($w[3],6,utf8_decode($row[3]),'LR',0,'L',$fill);
	$this->Cell($w[4],6,utf8_decode($row[4]),'LR',0,'L',$fill);
	$this->Cell($w[5],6,utf8_decode($row[5]),'LR',0,'L',$fill);
	$this->Cell($w[6],6,utf8_decode($row[6]),'LR',0,'L',$fill);
	$this->Cell($w[7],6,utf8_decode($row[7]),'LR',0,'L',$fill);
	$this->Cell($w[8],6,utf8_decode($row[8]),'LR',0,'L',$fill);
	$this->Cell($w[9],6,utf8_decode($row[9]),'LR',0,'L',$fill);
	$this->Cell($w[10],6,utf8_decode($row[10]),'LR',0,'L',$fill);
	$this->Cell($w[11],6,utf8_decode($row[11]),'LR',0,'L',$fill);
	$this->Cell($w[12],6,utf8_decode($row[12]),'LR',0,'L',$fill);
	$this->Cell($w[13],6,utf8_decode($row[13]),'LR',0,'L',$fill);
	$this->Cell($w[14],6,utf8_decode($row[14]),'LR',0,'L',$fill);

	
        $this->Ln();
        $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf=new PDF('L','mm','Letter');

//Column titles
$header=array('Id Orden','Fecha','Cedula','Nombre','Ap Paterno','Ap Materno','Origen','Destino','Costo','Ambulancia','Chofer','Camillero','Oxigeno','Medico','Elaboro');
$pdf->SetFont('Arial','',5);
$pdf->AddPage();
$pdf->FancyTable($header);
$pdf->Output();
?> 
