<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte General</title>
<script language='javascript' src="popcalendar.js"></script> 
<link rel="STYLESHEET" type="text/css" href="estilo.css">
</head>

<body>
<?
session_start();
$boton = $_POST["boton"];


$suma = $_POST ["totalt"];
$total = $_POST ["total"];

$fecha1 = $_POST ["fecha1"];
$fecha2 = $_POST ["fecha2"];


$promedio = $_POST ["promedio"];


if ($boton =="Regresar al Menu" )
   {
  header("location:S1menuReportes.php");
  }
 
if ($boton =="Imprimir" )
   {
  header("location:S1pdfFecha.php?tipo=$radio&suma=$suma&total=$total&fecha1=$fecha1&fecha2=$fecha2&promedio=$promedio");
  }

?>

<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="S1ReporteTurno.php">
<p align="center"><img src="btr.png" width="1200" height="80" /></p>
<br>
<p align="center">
Fecha Inicial:<input name="fecha1" type="text" id="dateArrival"  value="<? echo $fecha1 ?>" onClick="popUpCalendar(this, form1.dateArrival, 'yyyy-mm-dd');" size="10">
Fecha Final:<input name="fecha2" type="text" id="dateArrival1"  value="<? echo $fecha2 ?>" onClick="popUpCalendar(this, form1.dateArrival1, 'yyyy-mm-dd');" size="10"></p>
<table align="center" width="388" border="0">
  
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">

      <label>
      <input name="boton" type="submit" id="boton" value="Regresar al Menu" />
      </label>
    </div></td>
    <td colspan="2"><div align="center">
      <label>
      <input name="boton" type="submit" id="boton" value="Buscar" />
      </label>
    </div></td>
    <td><div align="center">
      <label>
      <input name="boton" type="submit" id="boton" value="Imprimir" />
      </label>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="47">&nbsp;</td>
    <td width="87">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<div ><!--checar id tabla para tamaño de letras en la tabla-->
  <p>
    <?

$conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or



      die ("Fallo en el establecimiento de la conexi&oacute;n");




   if ($boton=="Buscar")
{





               $result = pg_query ($conexion, "select count(turno) as totalvez from ordentraslado where estado='APROBADO' and turno='MATUTINO' and  fecha BETWEEN  '$fecha1' AND '$fecha2'")

               or die("Error en la consulta SQL");





               $res = pg_query ($conexion, "select count(turno) as totalvez2 from ordentraslado where estado='APROBADO' and turno='VESPERTINO' and  fecha BETWEEN  '$fecha1' AND '$fecha2'")

               or die("Error en la consulta SQL");
            
    


   
   while ($renglon=pg_fetch_array ($result))
   {

   $totalvez=$renglon["totalvez"];


}




   
   while ($renglon=pg_fetch_array ($res))
   {

   $totalvez2=$renglon["totalvez2"];


}




   
  


 
 ?>
</p>
</div>

<?php

 

echo "<table  width='200' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total Matutino</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$totalvez' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";




echo "<table  width='200' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total Vespertino</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$totalvez2' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";



$suma=$totalvez+$totalvez2;

echo "<table  width='200' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$suma' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";


}
?>

</form>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
