<?php

session_start();
require('fpdf.php');


class PDF extends FPDF
{

//Page header
function Header()
{
    //Logo
    $this->Image('bannertexto.png',15,8,180);
    //Arial bold 15
    $this->SetFont('Arial','B',8);
    //Move to the right
    $this->Cell(80);



//imprimir total de traslados
   $this->SetXY(40,30);

$this->Cell(8,8,'Total de Traslados: '.$_GET["suma"]);

//fin


//imprimir total

 $this->SetXY(90,30);

$this->Cell(8,8,'Total: '.$_GET["total"]);


//fin



//imprimir promedio

 $this->SetXY(140,30);

$this->Cell(8,8,'Promedio: '.$_GET["promedio"]);


//fin promedio



    //Title
    //$this->Cell(70,10,'Reporte por Periodo',1,0,'C');
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
    $w=array(13,13,16,16,13,6,13,13,13,13,16,10,20,15);
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
  
		  $result = pg_query ($conexion, "SELECT * from reportecancelado  where unidadp='$_SESSION[umf]' and estado='APROBADO' and fecha BETWEEN '$_GET[fecha1]' AND '$_GET[fecha2]' order by fecha")   or die("Error en la consulta SQL");

}

if ($_GET["tipo"]=="ac")
{


		
             $result = pg_query ($conexion, "SELECT *from reportecancelado where subac not in (0.00)  and unidadp='$_SESSION[umf]' and estado='APROBADO' and fecha BETWEEN '$_GET[fecha1]' AND '$_GET[fecha2]' order by fecha")   or die("Error en la consulta SQL");

 
}



if ($_GET["tipo"]=="sn")
{

  $result = pg_query ($conexion, "SELECT * from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and fecha BETWEEN '$_GET[fecha1]' AND '$_GET[fecha2]' order by fecha")   or die("Error en la consulta SQL");



}



   
	while ($row= pg_fetch_array ($result))
    {
         $this->Cell($w[0],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[0],'LR',0,'L',$fill);
	$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
	$this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
	$this->Cell($w[5],6,$row[5],'LR',0,'L',$fill);
	$this->Cell($w[6],6,$row[6],'LR',0,'L',$fill);
	$this->Cell($w[7],6,$row[7],'LR',0,'L',$fill);
	$this->Cell($w[8],6,$row[8],'LR',0,'L',$fill);
	$this->Cell($w[9],6,$row[9],'LR',0,'L',$fill);
	$this->Cell($w[10],6,$row[14],'LR',0,'L',$fill);
	$this->Cell($w[11],6,$row[22],'LR',0,'L',$fill);
	$this->Cell($w[12],6,$row[17],'LR',0,'L',$fill);
	$this->Cell($w[13],6,utf8_decode($row[24]),'LR',0,'L',$fill);
     $this->Ln();
     $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf=new PDF();
//Column titles
$header=array('Fecha','NoOrden','Cedula','Tipo','Sexo','Edad','Nombre','Ap Paterno','Ap Materno','Sub Pasajero','Destino','Total','Origen','Especialidad');
$pdf->SetFont('Arial','',5);
$pdf->AddPage();
$pdf->FancyTable($header);
$pdf->Output();
?> 
