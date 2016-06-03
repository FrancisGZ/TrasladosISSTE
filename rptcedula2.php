<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Cedula</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">
</head>

<body>
<?
session_start();
$boton = $_POST["boton"];
$cedula = $_POST ["cedula"];
$radio = $_POST ["tipo"];

if ($boton =="Regresar" )
   {
  header("location:menu2.php");
  }

if ($boton =="Imprimir" )
   {
header ("location:rptcedu.php?cedula=$cedula&tipo=$radio");
  }


if ($boton =="Limpiar" )
   {


header ("location:rptcedula2.php");
  }

  if ($boton =="Salir" )
    {  
     
    session_destroy();
    header ("location:login.php");

    }

?>
<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="rptcedula2.php">
<p align="center"><img src="bannertexto.png" width="1200" height="80" /></p>
<p align="center">
  <label></label>
</p>
<table align="center" width="581" border="0">
  <tr>
    <td colspan="4"> <div align="center">
   <label>Cedula:
        <input name="cedula" type="text" id="cedula" size="11" maxlength="11" value="<? echo $cedula ?>" />
    </label>
      <label>
 <? if ($radio=="ac") 
     
 {
    echo "<input name='tipo' type='radio' value='ac' checked />Con Acompañante";
}
if ($radio!="ac")
{
   echo    "<input name='tipo' type='radio' value='ac' />Con Acompañante";
}
?>
     </label>
      <label>
<? if ($radio=="sn") 
     
 {
    echo "<input name='tipo' type='radio' value='sn' checked />Sin Acompañante";
}
if ($radio!="sn")
{
   echo    "<input name='tipo' type='radio' value='sn' />Sin Acompañante";
}
?>


     </label>  
   
      <label>

<? if ($radio=="grl") 
     
 {
    echo "<input name='tipo' type='radio' value='grl' checked />General";
}
if ($radio!="grl")
{
   echo    "<input name='tipo' type='radio' value='grl' />General";
}
?>

      </label>
    </div></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="143">&nbsp;</td>
    <td colspan="2"><div align="center">
      <input name="boton" type="submit" id="boton" value="Buscar" />
    </div></td>
    <td width="161">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">
      <label>
      <input name="boton" type="submit" id="boton" value="Regresar" />
      </label>
    </div></td>
    <td width="123"><div align="center">
      <label>
      <input name="boton" type="submit" id="boton" value="Limpiar" />
      </label>
    </div></td>
    <td width="136"><div align="center">
      <input name="boton" type="submit" id="boton" value="Imprimir" />
    </div></td>
    <td><div align="center">
      <label></label>
      <div align="center">
        <label>
        <input name="boton" type="submit" id="boton" value="Salir" />
        </label>
      </div>
    </div></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<?


   if ($boton=="Buscar")
{


$conexion = pg_connect("host=localhost dbname=issste user=postgres password=administrador") or



      die ("Fallo en el establecimiento de la conexi&oacute;n");


if ($radio=="grl")
{


 $result = pg_query ($conexion, "select noorden,fecha,cedula,nompasajero,appaterno,apmaterno,ciudadpa,total,unidadp from reporte where cedula = '$cedula' and unidadp='$_SESSION[umf]'")

             or die("Error en la consulta SQL");
}

if ($radio=="ac")
{



 $result = pg_query ($conexion, "SELECT noorden,fecha,cedula,nompasajero,appaterno,apmaterno,ciudadpa,total,unidadp from reporte where subac not in (0.00) and cedula='$cedula' and unidadp='$_SESSION[umf]'")

             or die("Error en la consulta SQL");
}



if ($radio=="sn")
{


$result = pg_query ($conexion, "SELECT noorden,fecha,cedula,nompasajero,appaterno,apmaterno,ciudadpa,total,unidadp from reporte where subac=0.00 and cedula='$cedula' and unidadp='$_SESSION[umf]'")

             or die("Error en la consulta SQL");


}


 echo "<table align='center' width='970' border='1' bgcolor='#FF9900'>
   <tr>
     <td><div align='center'>No. Orden </div></td>
     <td><div align='center'>Fecha</div></td>
     <td><div align='center'>Cedula</div></td>
     <td><div align='center'>Nombre</div></td>
     <td><div align='center'>Apellido Parterno </div></td>
     <td><div align='center'>Apellido Materno </div></td>
     <td><div align='center'>Destino</div></td>
     <td><div align='center'>Total</div></td>
     <td><div align='center'>Clinica</div></td>
   </tr>";
   
   
   while ($renglon=pg_fetch_array ($result))
   {

   $orden=$renglon["noorden"];

   $fec=$renglon ["fecha"];

   $cedu=$renglon ["cedula"];

   $nom=$renglon ["nompasajero"];

   $paterno=$renglon["appaterno"];

   $materno=$renglon["apmaterno"];

   $destino=$renglon["ciudadpa"];

   $tot=$renglon["total"];

   $clinica=$renglon["unidadp"];



  echo "<tr bgcolor='#F2F2F2'>


      <td align='center'>$orden</td>

      <td align='center'>$fec</td>

      <td align='center'>$cedu</td>

      <td align='center'>$nom</td>

      <td align='center'>$paterno</td>

	  <td align='center'>$materno</td>
	  
	  <td align='center'>$destino</td>
	  
	  <td align='center'>$tot</td>

	  <td align='center'>$clinica</td>

    </tr>";




}



echo "</table>";
   
   
 
 ?>
</form>
<?
}
?>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
