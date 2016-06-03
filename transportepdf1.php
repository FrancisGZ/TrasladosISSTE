<?php
session_start();




$fecha=$_POST["fecha"];
$c1 = $_POST["c1"];
$c2 = $_POST["c2"];
$c3 = $_POST["c3"];

$nombre = $_POST["nombre"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];
$domicilio = $_POST["domicilio"];
$colonia = $_POST["colonia"];
$telefono = $_POST["telefono"];
$localizacion=$_POST["localizacion"];
$calles=$_POST["calles"];
$destino = $_POST["destino"];      
$ambulancia = $_POST["ambulancia"];
$chofer = $_POST["chofer"];
$camilla = $_POST["camilla"];
$camillero =$_POST["camillero"];
$oxigeno =$_POST["oxigeno"];
$diagnostico = $_POST["diagnostico"];
$motivo = $_POST["motivo"];
$medico = $_POST["medico"];
$boton = $_POST["boton"];
$usuario =$_SESSION["nomb"];

$cedula= $c1.$c2.$c3;

   if($camilla=="agree")
{
$camilla="SI";
}
else
{
$camilla="NO";
}


?>
<?php
if ($boton =="Regresar al Menu" )
   {
  header("location:menu6.php");
  }

if ($boton =="Limpiar" )
   {
  header("location:ordentras.php");
  }

  if ($boton =="Salir" )
    {  
     
    session_destroy();
    header ("location:login.php");

    }
if ($boton =="Buscar" )
   {
  header("location:ordentras.php?cedula=$cedula&c1=$c1&c2=$c2&c3=$c3");
  }

if ($boton=="Generar Orden")
{

$conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or

     die ("Fallo en el establecimiento de la conexi&oacute;n");


$rs = pg_query ($conexion, "select * from costos2 where nomciudad='$destino'" )
             or die("Error en la consulta SQL");


	
	
	while($renglon=pg_fetch_array($rs))
	{
		$idcost=$renglon["idcosto"];
		$costo=$renglon["costo"];
		
	}

if($camillero=="")
{
$camillero=" ";

}	

else {

       $costo=$costo+$costo;
}



  $sentencia="insert into derechohabiente (cedula,nompasajero,appaterno,apmaterno,domicilio,colonia,lugar,calles,telefono) values        ('$cedula','$nombre','$paterno','$materno','$domicilio','$colonia','$localizacion','$calles','$telefono')";

$sentencia2="insert into ordentransporte (fecha,cedula,idcosto,numambulancia,chofer,camillero,oxigeno,diagnostico,motivo,medico,nomempleado,costo)
   values ('$fecha','$cedula','$idcost','$ambulancia','$chofer','$camillero','$oxigeno','$diagnostico','$motivo','$medico','$usuario',$costo)";


  $sentencia3="update derechohabiente set nompasajero='$nombre',appaterno='$paterno',apmaterno='$materno',domicilio='$domicilio',colonia='$colonia',lugar='$localizacion',calles='$calles',telefono='$telefono' where cedula='$cedula'";

pg_query($sentencia);                      

pg_query($sentencia2);

pg_query($sentencia3);

}

require('fpdf.php');
$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(185,23);
$pdf->Cell(10,11,$fecha);
$pdf->Ln(10);
$pdf->SetX(73);
$pdf->Cell(10,11,'C.H.'.$celaya1);
$pdf->SetX(185);
$pdf->Cell(10,11,$c1.$c2.$c3);
$pdf->Ln(15);
$pdf->Cell(10,11,utf8_decode($nombre));
$pdf->Ln(3);
$pdf->Cell(10,11,utf8_decode($appa));
$pdf->SetX(25);
$pdf->Cell(10,11,utf8_decode($apma));
$pdf->SetX(73);
$pdf->Cell(10,11,$celaya1);
$pdf->SetX(100);
$pdf->Cell(10,11,$destino);
$pdf->SetX(125);
$pdf->Cell(10,11,$costo1);
$pdf->SetX(143);
$pdf->Cell(10,11,$destino);
$pdf->SetX(172);
$pdf->Cell(10,11,$celaya2);
$pdf->SetX(194);
$pdf->Cell(10,11,$costoregresopas);
$pdf->Ln(8);
$pdf->SetXY(194,60);
$pdf->Cell(10,11,$subtotalpas);//fin del derechoabiente
$pdf->Ln(5);  //inicio del acompañante
$pdf->Cell(10,11,utf8_decode($nomac));
$pdf->Ln(3);
$pdf->Cell(10,11,utf8_decode($appaac));
$pdf->SetX(25);
$pdf->Cell(10,11,utf8_decode($apmaac));
$pdf->SetX(73);
$pdf->Cell(10,11,$celaya2);
$pdf->SetX(100);
$pdf->Cell(10,11,$destino2);
$pdf->SetX(125);
$pdf->Cell(10,11,$costo2);
$pdf->SetX(143);
$pdf->Cell(10,11,$origenregresoaco);
$pdf->SetX(172);
$pdf->Cell(10,11,$celaya2);
$pdf->SetXY(194,67);
$pdf->Cell(10,11,$costoregresoaco);
$pdf->Ln(7);
$pdf->SetXY(194,73);
$pdf->Cell(10,11,$subtotalaco);
$pdf->Ln(7);
$pdf->SetXY(194,80);
$pdf->Cell(10,11,$total);
$pdf->SetXY(143,90);
$pdf->Cell(10,11,$especialidad);
$pdf->Ln(8);
$pdf->SetXY(67,100);
$pdf->Cell(10,11,utf8_decode($usuario));
$pdf->Output();
?>
