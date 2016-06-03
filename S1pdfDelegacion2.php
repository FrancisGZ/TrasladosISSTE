<?php




require('fpdf.php');



class PDF extends FPDF
{



//Page footers
function Footer()
{



    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
 
    $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');

   
}


//Colored table
function FancyTable($header)
{
    //Colors, line width and bold font
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0,0,0);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    //Header
    $w=array(40,35);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);
    $this->Ln();
    //Color and font restoration
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    //Data
    $fill=0;


$conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or

      die ("Fallo en el establecimiento de la conexión");


   $result = pg_query ($conexion, "select especialidad,count(especialidad) from reportecancelado where estado='APROBADO' and  fecha BETWEEN  '$_GET[fecha1]' AND '$_GET[fecha2]' group by especialidad order by especialidad")

             or die("Error en la consulta SQL");



   
	while ($row= pg_fetch_array ($result))
    {
        $this->Cell($w[0],3,$row[0],'LR',0,'C',$fill);
        $this->Cell($w[1],3,$row[1],'LR',0,'C',$fill);
        $this->Ln();
        $fill=!$fill;
    }
    $this->Cell(array_sum($w),0,'','T');





}


}

$pdf=new PDF();





//Column titles
$header=array('Especialidad','Numero de Traslados');

$header2=array('Sexo','Numero de Traslados');


$pdf->SetFont('Arial','B',6);
$pdf->AddPage();

/*Logo*/
    $pdf->Image('bannertexto.png',20,8,170);
/* $pdf->SetXY(85,8);
$pdf->Cell(8,8,'Cordinacion de Recursos Materiales');
$pdf->SetXY(85,12);
$pdf->Cell(8,8,'y Servicios Generales');*/


//imprimir fecha inicial
   $pdf->SetXY(35,30);

$pdf->Cell(8,8,'Fecha Incial:  '. $_GET["fecha1"]);


//fin impresion numero de pedido



/**imprimir fecha final */

 $pdf->SetXY(130,30);

$pdf->Cell(8,8,'Fecha Final:  '. $_GET["fecha2"]);


/*fin impresion de fecha*/

$pdf->SetFont('Arial','B',6);
$pdf->Ln(15);
$pdf->FancyTable($header);




$pdf->SetFont('Arial','B',6);
$pdf->SetX(55);
$pdf->Cell(10,11,'Total:  '. $_GET["totalesp"]);





/* Sexo*/
$pdf->SetFont('Arial','B',6);

$pdf->SetXY(120,40);
	$pdf->Cell(8,8,'Sexo');

$pdf->SetXY(110,45);
	$pdf->Cell(8,8,'Masculino:  '. $_GET["sexom"]);


$pdf->SetXY(110,50);
	$pdf->Cell(8,8,'Femenino:  '. $_GET["sexof"]);



$pdf->SetXY(115,55);
	$pdf->Cell(8,8,'Total:  '. $_GET["totalsexo"]);
/*fin sexo*/



/* Tipo*/
$pdf->SetFont('Arial','B',6);

$pdf->SetXY(160,40);
	$pdf->Cell(8,8,'Tipo');

$pdf->SetXY(150,45);
	$pdf->Cell(8,8,'1era Vez:  '. $_GET["totalvez1"]);


$pdf->SetXY(150,50);
	$pdf->Cell(8,8,'Subsecuente:  '. $_GET["totalvez2"]);


$pdf->SetXY(155,55);
	$pdf->Cell(8,8,'Total:  '. $_GET["vez"]);
/*fin Tipo*/


 

/* 3er nivel */
$pdf->SetFont('Arial','B',6);

$pdf->SetXY(120,70);
	$pdf->Cell(8,8,'Nivel');

$pdf->SetXY(110,75);
	$pdf->Cell(8,8,'Guadalajara:  '. $_GET["ciudad1"]);


$pdf->SetXY(110,80);
	$pdf->Cell(8,8,'Leon:  '. $_GET["ciudad2"]);


$pdf->SetXY(110,85);
	$pdf->Cell(8,8,'Mexico:  '. $_GET["ciudad3"]);



$pdf->SetXY(115,90);
	$pdf->Cell(8,8,'Total:  '. $_GET["totaln3"]);


/*fin 3er nivel*/





/* 3er nivel 
$pdf->SetFont('Arial','B',9);

$pdf->SetXY(160,70);
	$pdf->Cell(8,8,'2do Nivel');

$pdf->SetXY(150,75);
	$pdf->Cell(8,8,'Guanajuato:  '. $_GET["ciudad21"]);


$pdf->SetXY(150,80);
	$pdf->Cell(8,8,'Irapuato:  '. $_GET["ciudad22"]);


$pdf->SetXY(150,85);
	$pdf->Cell(8,8,'Total 2do Nivel:  '. $_GET["totaln2"]);


$totalnivel=$_GET["totaln2"]+$_GET["totaln3"];



/* turnos */
$pdf->SetFont('Arial','B',6);

$pdf->SetXY(160,70);
	$pdf->Cell(8,8,'Turnos');

$pdf->SetXY(155,75);
	$pdf->Cell(8,8,'Matutino:  '. $_GET["turnom"]);


$pdf->SetXY(155,80);
	$pdf->Cell(8,8,'Vespertino:  '. $_GET["turnov"]);


$pdf->SetXY(160,85);
	$pdf->Cell(8,8,'Total:  '. $_GET["totalturno"]);

/*fin turnos*/





/* Medio */
$pdf->SetFont('Arial','B',6);

$pdf->SetXY(120,105);
	$pdf->Cell(8,8,'Medio');

$pdf->SetXY(110,110);
	$pdf->Cell(8,8,'Automovil:  '. $_GET["auto"]);


$pdf->SetXY(110,115);
	$pdf->Cell(8,8,'Flecha:  '. $_GET["flecha"]);


$pdf->SetXY(115,120);
	$pdf->Cell(8,8,'Total:  '. $_GET["totalmedio"]);

/*fin Medio*/






/* Promedio */
$pdf->SetFont('Arial','B',6);


$pdf->SetXY(150,110);
	$pdf->Cell(8,8,'Promedio:  '. $_GET["promedio"]);
/*fin de promediio*/

$pdf->Output();
?> 
