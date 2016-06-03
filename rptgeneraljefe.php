<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte General</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">
</head>

<body>
<?
session_start();
$boton = $_POST["boton"];
$radio = $_POST["tipo"];


if ($boton =="Regresar" )
   {
  header("location:menu5.php");
  }
 
if ($boton =="Imprimir" )
   {
  header("location:rptgrljefe.php?tipo=$radio");
  }


  if ($boton =="Salir" )
    {  
     
    session_destroy();
    header ("location:login.php");

    }

?>

<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="rptgeneraljefe.php">
<p align="center"><img src="bannertexto.png" width="1200" height="80" /></p>
<p align="center">&nbsp;</p>
<table align="center" width="388" border="0">
  <tr>
    <td colspan="4"><div align="center">
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
    <td width="119">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td width="117">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">
      <label>
       <input name="boton" type="submit" id="boton" value="Buscar" />
      </label>
    </div></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">

      <label>
      <input name="boton" type="submit" id="boton" value="Regresar" />
      </label>
    </div></td>
    <td colspan="2"><div align="center">
      <label>
      <input name="boton" type="submit" id="boton" value="Imprimir" />
      </label>
    </div></td>
    <td><div align="center">
      <label>
      <input name="boton" type="submit" id="boton" value="Salir" />
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
<div id="tabla">
<?





   if ($boton=="Buscar")
{
$conexion = pg_connect("host=localhost dbname=issste user=postgres password=administrador") or



      die ("Fallo en el establecimiento de la conexi&oacute;n");



if ($radio=="grl")
{


 $result = pg_query ($conexion, "SELECT * from reporte")

             or die("Error en la consulta SQL");
}

if ($radio=="ac")
{



 $result = pg_query ($conexion, "SELECT * from reporte where subac not in (0.00)")

             or die("Error en la consulta SQL");
}



if ($radio=="sn")
{


$result = pg_query ($conexion, "SELECT * from reporte where subac=0.00")

             or die("Error en la consulta SQL");


}










 echo "<table class='tabla' align='center' width='970' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>No. Orden </div></td>
     <td align='center'>Fecha</div></td>
     <td align='center'>Cedula</div></td>
     <td align='center'>Tipo de Derechohabiente</div></td>
     <td align='center'>Sexo</div></td>
     <td align='center'>Edad</div></td>
     <td align='center'>Nombre</div></td>
     <td align='center'>Apellido Parterno </div></td>
     <td align='center'>Apellido Materno </div></td>
     <td align='center'>Categoria</div></td>
     <td align='center'>Destino Pasajero</div></td>
     <td align='center'>Subtotal Pasajero</div></td>
     <td align='center'>Nombre Acompa&ntilde;ante</div></td>
     <td align='center'>Apellido Paterno Acompa&ntilde;ante</div></td>
     <td align='center'>Apellido Materno Acompa&ntilde;ante</div></td>
     <td align='center'>Categoria Acompa&ntilde;ante</div></td>
     <td align='center'>Destino Acompa&ntilde;ante</div></td>
     <td align='center'>Subtotal Acompa&ntilde;ante</div></td>
     <td align='center'>Total</div></td>
     <td align='center'>Tipo Servicio</div></td>
     <td align='center'>Especialidad</div></td>
     <td align='center'>Clinica</div></td>
     <td align='center'>Elaboro</div></td>
   </tr>";
   
   
   while ($renglon=pg_fetch_array ($result))
   {

   $orden=$renglon["noorden"];

   $fec=$renglon ["fecha"];

   $cedu=$renglon ["cedula"];

   $der=$renglon ["tipoder"];

   $sexo=$renglon ["sexo"];

   $edad=$renglon ["edad"];

   $nom=$renglon ["nompasajero"];

   $paterno=$renglon["appaterno"];

   $materno=$renglon["apmaterno"];

   $catpa=$renglon ["categoriapa"];

   $destino1=$renglon ["ciudadpa"];

   $subp=$renglon ["subpasajero"];

   $nomac=$renglon ["nomac"];

   $appaac=$renglon ["appaternoac"];

   $apmaac=$renglon ["apmaternoac"];

   $catac=$renglon ["categoriaacomp"];

   $destino2=$renglon ["ciudadacomp"];

   $subac=$renglon ["subac"];

   $tot=$renglon["total"];

   $ser=$renglon ["tiposervicio"];

   $esp=$renglon ["especialidad"];

   $elaboro=$renglon ["nomempleado"];

   $clinica=$renglon ["unidadp"];



  echo "<tr bgcolor='#F2F2F2'>


      <td align='center'>$orden</td>

      <td align='center'>$fec</td>

      <td align='center'>$cedu</td>

      <td align='center'>$der</td>

      <td align='center'>$sexo</td>

      <td align='center'>$edad</td>

      <td align='center'>$nom</td>

      <td align='center'>$paterno</td>

      <td align='center'>$materno</td>
	  
      <td align='center'>$catpa</td>

      <td align='center'>$destino1</td>

      <td align='center'>$subp</td>

      <td align='center'>$nomac</td>

      <td align='center'>$appaac</td>

      <td align='center'>$apmaac</td>

      <td align='center'>$catac</td>

      <td align='center'>$destino2</td>

      <td align='center'>$subac</td>
	  
      <td align='center'>$tot</td>

      <td align='center'>$ser</td>

      <td align='center'>$esp</td>

      <td align='center'>$clinica</td>

      <td align='center'>$elaboro</td>

    </tr>";




}



echo "</table>";
   
   pg_close();

}
 
 ?>
</div>
</form>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
