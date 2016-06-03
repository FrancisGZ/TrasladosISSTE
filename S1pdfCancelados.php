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
    $this->SetFont('Arial','B',8);
    //Move to the right
    $this->Cell(80);

//imprimir total de traslados
   $this->SetXY(90,30);

$this->Cell(8,8,'Total de Traslados:');

$this->SetXY(117,30);
   $this->Cell(8,8,$_GET["suma"]);
//fin


//imprimir total

 $this->SetXY(150,30);

$this->Cell(8,8,'Total:');

$this->SetXY(160,30);
   $this->Cell(8,8,$_GET["total"]);
//fin

    //Title
    //$this->Cell(70,10,'Reporte',1,0,'C');
    //Line break
    $this->Ln(10);
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
    $w=array(8,9,11,14,10,5,12,12,12,10,13,10,12,12,12,10,13,8,8,19,19,24);
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

if($_GET["tipo"]=="grl")
{
   $result = pg_query ($conexion, "select * from reportecancelado where estado='CANCELADO'  and unidadp='$_SESSION[umf]';" )

             or die("Error en la consulta SQL");
}

if ($_GET["tipo"]=="ac")
{



 $result = pg_query ($conexion, "SELECT * from reportecancelado where subac not in (0.00) and estado='CANCELADO'  and unidadp='$_SESSION[umf]';")

             or die("Error en la consulta SQL");
}



if ($_GET["tipo"]=="sn")
{


$result = pg_query ($conexion, "SELECT * from reportecancelado where subac=0.00 and estado='CANCELADO'  and unidadp='$_SESSION[umf]';")

             or die("Error en la consulta SQL");


}



   
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
	$this->Cell($w[9],6,utf8_decode($row[15]),'LR',0,'L',$fill);
	$this->Cell($w[10],6,utf8_decode($row[14]),'LR',0,'L',$fill);
	$this->Cell($w[11],6,utf8_decode($row[9]),'LR',0,'L',$fill);
	$this->Cell($w[12],6,utf8_decode($row[10]),'LR',0,'L',$fill);
	$this->Cell($w[13],6,utf8_decode($row[11]),'LR',0,'L',$fill);
	$this->Cell($w[14],6,utf8_decode($row[12]),'LR',0,'L',$fill);
	$this->Cell($w[15],6,utf8_decode($row[19]),'LR',0,'L',$fill);
	$this->Cell($w[16],6,utf8_decode($row[18]),'LR',0,'L',$fill);
	$this->Cell($w[17],6,utf8_decode($row[13]),'LR',0,'L',$fill);
	$this->Cell($w[18],6,utf8_decode($row[22]),'LR',0,'L',$fill);
	//$this->Cell($w[19],6,utf8_decode($row[25]),'LR',0,'L',$fill);
	$this->Cell($w[20],6,utf8_decode($row[24]),'LR',0,'L',$fill);
	$this->Cell($w[20],6,utf8_decode($row[17]),'LR',0,'L',$fill);
	$this->Cell($w[21],6,utf8_decode($row[23]),'LR',0,'L',$fill);
        $this->Ln();
        $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf=new PDF('L','mm','Letter');

//Column titles
$header=array('No. Orden','Fecha','Cedula','Tipo','Sexo','Edad','Nombre','Ap Paterno','Ap Materno','Categoria','Destino','Sub Pasajero','Nomb Acomp','Ap Paterno','Ap Materno','Categoria','Destino','Sub Acomp','Total','Especialidad','Origen','Elaboro');
$pdf->SetFont('Arial','',4);
$pdf->AddPage();
$pdf->FancyTable($header);
$pdf->Output();
?> 
