<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
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

if($camillero=="")
{
$camillero=" ";
}




$conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or

     die ("Fallo en el establecimiento de la conexi&oacute;n");


$rs = pg_query ($conexion, "select * from costos2 where nomciudad='$destino'" )
             or die("Error en la consulta SQL");


	
	
	while($renglon=pg_fetch_array($rs))
	{
		$idcost=$renglon["idcosto"];
		
	}
	

echo $idcost;


  $sentencia="insert into derechohabiente (cedula,nompasajero,appaterno,apmaterno,domicilio,colonia,lugar,calles,telefono) values        ('$cedula','$nombre','$paterno','$materno','$domicilio','$colonia','$lugar','$calles','$telefono')";

$sentencia2="insert into ordentransporte (fecha,cedula,idcosto,numambulancia,chofer,camillero,oxigeno,diagnostico,motivo,medico)
   values ('$fecha','$cedula','$idcost','$ambulancia','$chofer','$camillero','$oxigeno','$diagnostico','$motivo','$medico')";

pg_query($sentencia);                      

pg_query($sentencia2);

?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Menu</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">

</head>


<body>


</body>
</html>
