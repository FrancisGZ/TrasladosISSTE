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
$radio = $_POST ["tipo"];

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
<form id="form1" name="form1" method="post" action="S1ReporteFecha2.php">
<p align="center"><img src="btr.png" width="1200" height="80" /></p>
<br>
<p align="center">
Fecha Inicial:<input name="fecha1" type="text" id="dateArrival"  value="<? echo $fecha1 ?>" onClick="popUpCalendar(this, form1.dateArrival, 'yyyy-mm-dd');" size="10">
Fecha Final:<input name="fecha2" type="text" id="dateArrival1"  value="<? echo $fecha2 ?>" onClick="popUpCalendar(this, form1.dateArrival1, 'yyyy-mm-dd');" size="10"></p>
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
<div id="tabla">
  <p>
    <?

$conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or



      die ("Fallo en el establecimiento de la conexi&oacute;n");




   if ($boton=="Buscar")
{



            if ($radio=="grl")
             {


               $result = pg_query ($conexion, "SELECT * from reportecancelado  where unidadp='$_SESSION[umf]' and estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

               or die("Error en la consulta SQL");




             $res = pg_query ($conexion, "select sum(total) as total from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
             
            
            
            $r = pg_query ($conexion, "select count(total) as tras from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
              }


             if ($radio=="ac")
             {


             $result = pg_query ($conexion, "SELECT *from reportecancelado where subac not in (0.00)  and unidadp='$_SESSION[umf]' and estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");
             
            $res = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 $r = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
                        
                        

             }



             if ($radio=="sn")
             {


            $result = pg_query ($conexion, "SELECT * from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");



             $res = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 
             $r = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");


               }










 echo "<table class='tabla' align='center' width='970' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>No. Orden </div></td>
     <td align='center'>Fecha</div></td>
     <td align='center'>Cedula</div></td>
     <td align='center'>Tipo Der</div></td>
     <td align='center'>Edad</div></td>
     <td align='center'>Nombre</div></td>
     <td align='center'>Apellido Parterno </div></td>
     <td align='center'>Apellido Materno </div></td>
     <td align='center'>Categoria</div></td>
     <td align='center'>Subtotal Pasajero</div></td>
     <td align='center'>Nombre Acompa&ntilde;ante</div></td>
     <td align='center'>Apellido Paterno Acompa&ntilde;ante</div></td>
     <td align='center'>Apellido Materno Acompa&ntilde;ante</div></td>
     <td align='center'>Categoria Acompa&ntilde;ante</div></td>
     <td align='center'>Subtotal Acompa&ntilde;ante</div></td>
     <td align='center'>Total</div></td>
     <td align='center'>Tipo Servicio</div></td>
     <td align='center'>Especialidad</div></td>
     <td align='center'>Destino</div></td>
     <td align='center'>Origen</div></td>
     <td align='center'>Elaboro</div></td>
   </tr>";
   
   
   while ($renglon=pg_fetch_array ($result))
   {

   $orden=$renglon["noorden"];

   $fec=$renglon ["fecha"];

   $cedu=$renglon ["cedula"];

   $der=$renglon ["tipoder"];


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


      <td align='center'>$edad</td>

      <td align='center'>$nom</td>

      <td align='center'>$paterno</td>

      <td align='center'>$materno</td>
	  
      <td align='center'>$catpa</td>

      <td align='center'>$subp</td>

      <td align='center'>$nomac</td>

      <td align='center'>$appaac</td>

      <td align='center'>$apmaac</td>

      <td align='center'>$catac</td>

      <td align='center'>$subac</td>
	  
      <td align='center'>$tot</td>

      <td align='center'>$ser</td>

      <td align='center'>$esp</td>

   <td align='center'>$destino1</td>

      <td align='center'>$clinica</td>



      <td align='center'>$elaboro</td>

    </tr>";





}


echo "</table><br>";
   
  


 
 ?>
</p>
</div>

<?php

while ($ren=pg_fetch_array ($r))
   {

   $t=$ren["tras"];


}


 


while ($reng=pg_fetch_array ($res))
   {

   $suma=$reng["total"];



}


echo "<table class='tabla' width='200' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$t' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";


echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='80' >Total</td>

    <td bgcolor='#F2F2F2'  width='100'><input name='total' type='text' id='total' size='10' maxlength='10' value='$$suma' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";


/*promedio de traslados*/

$promedio=$suma/$t;

echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>



<tr>

      <td  width='80' >Promedio</td>



    <td bgcolor='#F2F2F2'  width='100'><input name='promedio' type='text' id='promedio' size='10' maxlength='10' value='$promedio' readonly='readonly'  /></td>

    </tr>

    

  </table>";

/*fin de pormedio de traslados*/

}
?>

</form>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
