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
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->SetFontSize(16);
$pdf->Image('NuevoIssste.jpg' , 140,5, 35 , 38,'JPG', ' ');
$pdf ->Cell (10,11,'SOLICITUD DE AMBULANCIA');
$pdf->Ln( 10);
$pdf ->Cell (10,11,'DELEGACION GUANAJUATO');
$pdf->Ln( 10);
$pdf ->Cell (10,11,'SUBDELEGACION MEDICA');
$pdf->Ln( 35);
$pdf->SetFontSize(10);
$pdf->Cell(10,11,'CELAYA, GTO.  A'.' '.$fecha);
$pdf->Ln(7);
$pdf->SetFontSize(10);
$pdf->Cell(10,11,'CEDULA:  '.$c1.$c2.$c3 );
$pdf->Ln(7);
$pdf->Cell(10,11,'NOMBRE:  '.utf8_decode($nombre).'   '.utf8_decode($paterno).'   '.utf8_decode($materno));
$pdf->Ln(7);
$pdf->Cell(10,11,'DOMICILIO:  '.utf8_decode($domicilio));
$pdf->Ln(7);
$pdf->Cell(10,11,'COLONIA:  '.utf8_decode($colonia));
$pdf->Ln(7);
$pdf->Cell(10,11,'TELEFONO:  '.$telefono);
$pdf->Ln(7);
$pdf->Cell(10,11,'LUGAR DE LOCALIZACION:  '.$localizacion);
$pdf->Ln(7);
$pdf->Cell(10,11,'ENTRE QUE CALLES ESTA:  '.$calles);
$pdf->Ln(7);
$pdf->Cell(10,11,'DESTINO:  '.$destino);
$pdf->Ln(7);
$pdf->Cell(10,11,' AMBULANCIA NO. ECONOMICO:  '.$ambulancia);
$pdf->Ln(7);
$pdf->Cell(10,11,' NOMBRE CHOFER:  '.$chofer);
$pdf->Ln(7);
$pdf->Cell(10,11,' REQUIERE CAMILLERO:  '.$camilla);
$pdf->Ln(7);
$pdf->Cell(10,11,' CAMILLERO:  '.$camillero);
$pdf->Ln(7);
$pdf->Cell(10,11,' REQUIERE OXIGENO:  '.$oxigeno);
$pdf->Ln(7);
$pdf->Cell(10,11,' DIAGNOSTICO:  '.$diagnostico);
$pdf->Ln(7);
$pdf->Cell(10,11,' MOTIVO TRASLADO:  '.$motivo);
$pdf->Ln(7);
$pdf->Cell(10,11,' MEDICO SOLICITANTE: '.$medico);
$pdf->Ln(7);
$pdf->Cell(10,11,' HORA  DE SALIDA: '.'  _____________________________________________________________________' );
$pdf->Ln(7);
$pdf->Cell(10,11,' HORA  DE LLEGADA: '.'  ___________________________________________________________________' );
$pdf->Ln(7);
$pdf->Cell(10,11,' KILOMETRAJE:' );
$pdf->Ln(7);
$pdf->Cell(10,11,'SALIDA: '.' _______________________'.'  ENTRADA:  __________________________' );
$pdf->Ln(12);
$pdf->Cell(10,11,'ELABORO: '.utf8_decode($usuario));
$pdf->Ln(37);
$pdf->Cell(10,11,' AUTORIZADA POR  DR. GERARDO JULIAN OLALDE MOLINA ');
$pdf->Output();
?>
