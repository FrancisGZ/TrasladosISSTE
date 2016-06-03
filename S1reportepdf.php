<?php
$orden = $_POST["noorden"];
$fecha=$_POST["fecha"];
$c1 = $_POST["noafi1"];
$c2 = $_POST["noafi2"];
$c3 = $_POST["noafi3"];


$categoria1=$_POST["categoria"];

$categoria2=$_POST["categoriaac"];

$nombre = $_POST["nombre"];
$appa = $_POST["appa"];
$apma = $_POST["apma"];
$costo1 = $_POST["costopas"];
$subtotalpas = $_POST["subtotalpas"];
$costoregresopas = $_POST["costoregresopas"];
$celaya1=$_POST["celaya"];
$destino = $_POST["destino"];  
$cita = $_POST["cita"];      
//acompañante
$nomac = $_POST["nombreac"];
$appaac = $_POST["appaac"];
$apmaac = $_POST["apmaac"];
$destino2 =$_POST["destino2"];
$origenregresoaco =$_POST["origenregresoaco"];
$total = $_POST["total"];
$categoria2 = $_POST["categoria2"];
$celaya2=$_POST["celaya3"];

$especialidad = $_POST["especialidad"];
$costo2=$_POST["costo2"];
$subtotalaco=$_POST["subtotalaco"];
$costoregresoaco=$_POST["costoregresoaco"];
$boton = $_POST["boton"];
$usuario =$_POST['elaboro'];
?>
<?php
if ($boton =="Regresar al Menu" )
   {
  header("location:S1menu.php");
  }

  if ($boton =="Salir" )
    {  
     
    session_destroy();
    header ("location:Login.php");

    }



if ($categoria1 == "AUTOMOVIL") {

   $categoacomp="AUTOMOVIL";

}else{

   $categoacomp="COMPLETO";
   
}


require('fpdf.php');
$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(179,26);
$pdf->Cell(10,11,(date('j')));
$pdf->SetXY(187,26);
$pdf->Cell(10,11,(date('n')));
$pdf->SetXY(194,26);
$pdf->Cell(10,11,(date('Y')));
//$pdf->Cell(10,11,$fecha);
$pdf->Ln(8);
$pdf->SetX(73);
$pdf->Cell(10,11,'C.H.'.$celaya1);
$pdf->SetX(180);
$pdf->Cell(10,11,utf8_decode($c1."  ".$c2." / ".$c3));

$pdf->Ln(6);
$pdf->SetX(50);
$pdf->Cell(10,11,utf8_decode($categoria1));


$pdf->Ln(6);
$pdf->Cell(10,11,utf8_decode($nombre));
$pdf->Ln(3);
$pdf->Cell(10,11,utf8_decode($appa));



$pdf->SetX(70);
$pdf->Cell(10,11,$celaya1);
$pdf->SetX(95);
$pdf->Cell(10,11,$destino);
$pdf->SetX(125);
$pdf->Cell(10,11,$costo1);
$pdf->SetX(138);
$pdf->Cell(10,11,$destino);
$pdf->SetX(170);
$pdf->Cell(10,11,$celaya1);
$pdf->SetX(194);
$pdf->Cell(10,11,$costoregresopas);


$pdf->Ln(3);
//$pdf->SetX(25);
$pdf->Cell(10,11,utf8_decode($apma));



$pdf->Ln(8);
if($nomac!=""){
$pdf->SetXY(50,59);
$pdf->Cell(10,11,$categoacomp);//fin del derechoabiente
}

if($nomac==""){
$pdf->SetXY(50,59);
$pdf->Cell(10,11,"XXX");
}




$pdf->SetXY(194,59);
$pdf->Cell(10,11,$subtotalpas);//fin del derechoabiente
$pdf->Ln(3);  //inicio del acompañante


//inicio if con acompañante
if ($nomac!=""){

$pdf->Cell(10,11,utf8_decode($nomac));
$pdf->Ln(3);
$pdf->Cell(10,11,utf8_decode($appaac));


$pdf->SetX(70);
$pdf->Cell(10,11,$celaya2);
$pdf->SetX(95);
$pdf->Cell(10,11,$destino2);
$pdf->SetX(125);
$pdf->Cell(10,11,$costo2);
$pdf->SetX(138);
$pdf->Cell(10,11,$origenregresoaco);
$pdf->SetX(170);
$pdf->Cell(10,11,$celaya2);
$pdf->SetXY(194,65);
$pdf->Cell(10,11,$costoregresoaco);


$pdf->Ln(3);
$pdf->Cell(10,11,utf8_decode($apmaac));

$pdf->Ln(7);




if ($categoria1 == "AUTOMOVIL") {

$pdf->SetXY(47,75);
$pdf->Cell(10,11,'0');

}


if (($categoria1=="COMPLETO") || ($categoria1=="MEDIO")){

$pdf->SetXY(47,75);
$pdf->Cell(10,11,'4');
   
}

if($categoria1=="DOBLE ACOM")
{
$pdf->SetXY(47,75);
$pdf->Cell(10,11,'2');

}


//$pdf->SetXY(47,75);
//$pdf->Cell(10,11,'4');

$pdf->SetXY(194,73);
$pdf->Cell(10,11,$subtotalaco);
}// fin if con acompañante


//inicio if sin acompañante
if ($nomac==""){

//$pdf->Cell(10,11,'XXX');
$pdf->Ln(3);
$pdf->Cell(10,11,'XXX');


$pdf->SetX(70);
$pdf->Cell(10,11,'XXX');
$pdf->SetX(95);
$pdf->Cell(10,11,'XXX');
$pdf->SetX(125);
$pdf->Cell(10,11,'0.00');
$pdf->SetX(138);
$pdf->Cell(10,11,'XXX');
$pdf->SetX(170);
$pdf->Cell(10,11,'XXX');
$pdf->SetXY(194,65);
$pdf->Cell(10,11,'0.00');


$pdf->Ln(3);

//$pdf->Cell(10,11,'XXX');

$pdf->Ln(7);





if ($categoria1 == "AUTOMOVIL") {

$pdf->SetXY(47,75);
$pdf->Cell(10,11,'0');

}else{

$pdf->SetXY(47,75);
$pdf->Cell(10,11,'2');
   
}





//$pdf->SetXY(47,75);
//$pdf->Cell(10,11,'2');

$pdf->SetXY(194,73);
$pdf->Cell(10,11,'0.00');
}// fin if sin acompañante


$pdf->Ln(7);
$pdf->SetXY(194,80);
$pdf->Cell(10,11,$total);

$pdf->SetXY(143,85);
$pdf->Cell(10,11,utf8_decode($cita));
$pdf->SetXY(143,90);
$pdf->Cell(10,11,utf8_decode($especialidad));


$pdf->Ln(8);
$pdf->SetXY(67,100);
$pdf->Cell(10,11,utf8_decode($usuario));
$pdf->Output();
?>
