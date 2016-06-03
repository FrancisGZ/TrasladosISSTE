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


$totaln3 = $_POST ["totaln3"];
$totaln2 = $_POST ["totaln2"];
$totalesp = $_POST ["totalesp"];
$totalsexo = $_POST ["totalsexo"];
$vez = $_POST ["vez"];
$sexof = $_POST ["sexof"];
$sexom = $_POST ["sexom"];
$totalvez1 = $_POST ["totalvez1"];
$totalvez2 = $_POST ["totalvez2"];
$ciudad1=$_POST["ciudad1"];
$ciudad2=$_POST["ciudad2"];
$ciudad3=$_POST["ciudad3"];
$ciudad4=$_POST["ciudad4"];
$ciudad21=$_POST["ciudad21"];
$ciudad22=$_POST["ciudad22"];

$fecha1 = $_POST ["fecha1"];
$fecha2 = $_POST ["fecha2"];


$turnom=$_POST["turnom"];
$turnov=$_POST["turnov"];
$totalturno=$_POST["totalturno"];

$auto=$_POST["auto"];
$flecha=$_POST["flecha"];
$totalmedio=$_POST["totalmedio"];

$promedio = $_POST ["promedio"];


if ($boton =="Regresar al Menu" )
   {
  header("location:S1menuReportes.php");
  }
 
if ($boton =="Imprimir" )
   {
  header("location:S1pdfDelegacion2.php?totaln3=$totaln3&totaln2=$totaln2&totalesp=$totalesp&totalsexo=$totalsexo&vez=$vez&fecha1=$fecha1&fecha2=$fecha2&sexof=$sexof&sexom=$sexom&totalvez1=$totalvez1&totalvez2=$totalvez2&ciudad1=$ciudad1&ciudad2=$ciudad2&ciudad3=$ciudad3&ciudad4=$ciudad4&ciudad21=$ciudad21&ciudad22=$ciudad22&turnom=$turnom&turnov=$turnov&totalturno=$totalturno&auto=$auto&flecha=$flecha&totalmedio=$totalmedio&promedio=$promedio");
  }





?>

<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="S1ReporteDelegacion.php">
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

echo "<h2>Especialidad</h2>";



               $result = pg_query ($conexion, "select especialidad,count(especialidad) from reportecancelado where estado='APROBADO' and  fecha BETWEEN  '$fecha1' AND '$fecha2' group by especialidad order by especialidad")

               or die("Error en la consulta SQL");


            
            
            
            $r = pg_query ($conexion, "select count(total) as tras from reportecancelado where  estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 



 echo "<table align='center' width='600' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>No. Orden </div></td>
     <td align='center'>Fecha</div></td>
     
   </tr>";
   
   
   while ($renglon=pg_fetch_array ($result))
   {

   $especialidad=$renglon["especialidad"];

   $count=$renglon ["count"];

   


  echo "<tr bgcolor='#F2F2F2'>


      <td align='center'>$especialidad</td>

      <td align='center'>$count</td>

    </tr>";





}


echo "</table><br>";
   
  


 
 ?>
</p>
</div>

<?php

while ($ren=pg_fetch_array ($r))
   {

   $totalesp=$ren["tras"];


}


 

echo "<table  width='200' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalesp' type='text' id='totalesp' size='5' maxlength='5' value='$totalesp' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";


/*------------------------------------------------------------------------------reporte por sexo---------------------------------------------------------------------*/

echo "<h2>Sexo</h2>";


 $resultfem = pg_query ($conexion, "SELECT count(sexo) as sexof from reportecancelado  where estado='APROBADO' and sexo='FEMENINO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

               or die("Error en la consulta SQL");




             $resultmas = pg_query ($conexion, "SELECT count(sexo) as sexom from reportecancelado where  estado='APROBADO' and sexo='MASCULINO'  and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");




 echo "<table align='center' width='600' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>Sexo</div></td>
     <td align='center'>Numero de Traslados</div></td>

     
   </tr>";

             




while ($ren=pg_fetch_array ($resultfem))
   {

  $sexof=$ren["sexof"];

}


  echo "<tr bgcolor='#F2F2F2'>


      <td align='center'>Femenino</td>


      <td align='center'><input name='sexof' type='text' id='sexof'  size='5' maxlength='5' value='$sexof' readonly='readonly'  /></td>

    </tr>";


while ($ren=pg_fetch_array ($resultmas))
   {

  $sexom=$ren["sexom"];

}

  echo "<tr bgcolor='#F2F2F2'>



      <td align='center'>Masculino</td>


      <td align='center'><input name='sexom' type='text' id='sexom'  size='5' maxlength='5' value='$sexom' readonly='readonly'  /></td>


    </tr>";

$totalsexo=$sexom+$sexof;

echo "</table><br>";





echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>


<tr>
      <td  width='150'>Total de Traslados Nivel 3</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalsexo' type='text' id='totalsexo' size='5' maxlength='5' value='$totalsexo' readonly='readonly'  /></td>

    </tr>
    
  </table><br>";




/*------------------------------------------------------------------------------reporte por Tipo Vez------------------------------------------------------------------*/

echo "<h2>Tipo</h2>";





               $resultVez = pg_query ($conexion, "select vez,count(vez) as totalvez from reportecancelado where estado='APROBADO' and  fecha BETWEEN  '$fecha1' AND '$fecha2' group by vez")

               or die("Error en la consulta SQL");






 echo "<table align='center' width='600' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>Tipo</div></td>
     <td align='center'>Numero de Traslados</div></td>

     
   </tr>";
   
  
$varvez=0;
$num=1;

while ($ren=pg_fetch_array ($resultVez))
   {


 $totalvez=$ren["totalvez"];

 $vez=$ren["vez"];



  echo "<tr bgcolor='#F2F2F2'>


      <td align='center'>$vez</td>


      <td align='center'><input name='totalvez$num' type='totalvez.$num' id='totalvez'  size='5' maxlength='5' value='$totalvez' readonly='readonly'  /></td>

    </tr>";

$varvez=$varvez+$totalvez;
$num ++;
}


echo "</table><br>";
   


  




echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados</td>

    <td bgcolor='#F2F2F2' width='50'><input name='vez' type='text' id='vez' size='5' maxlength='5' value='$varvez' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";








/*------------------------------------------------------------------------------reporte por nivel---------------------------------------------------------------------*/

echo "<h2>Nivel</h2>";
/*------------------------------------------------------------------------------3er nivel----------------------------------------------------------------------------*/

echo "<h4>3er Nivel</h4>";



               $result = pg_query ($conexion, "select ciudadpa,count(ciudadpa) as totaldestino from reportecancelado where ciudadpa IN ('GUADALAJARA','LEON','MEXICO') and estado='APROBADO' AND fecha BETWEEN  '$fecha1' AND '$fecha2' group by ciudadpa order by ciudadpa")

               or die("Error en la consulta SQL");




 echo "<table align='center' width='600' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>Destino</div></td>
     <td align='center'>Numero de Traslados</div></td>

     
   </tr>";
   
  
$var=0;
$num2=1;

while ($ren=pg_fetch_array ($result))
   {

  $ciudad=$ren["ciudadpa"];

   $totaldestino=$ren["totaldestino"];



  echo "<tr bgcolor='#F2F2F2'>


      <td align='center'>$ciudad</td>


      <td align='center'><input name='ciudad$num2' type='text' id='ciudad$num2'  size='5' maxlength='5' value='$totaldestino' readonly='readonly'  /></td>

    </tr>";




$var=$var+$totaldestino;
$num2 ++;
}


echo "</table><br>";
   








echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados por Nivel</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totaln3' type='text' id='totaln3' size='5' maxlength='5' value='$var' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";




/*------------------------------------------------------------------------------2do nivel----------------------------------------------------------------------------*/

/*echo "<h4>2do Nivel</h4>";


               $result2 = pg_query ($conexion, "select ciudadpa,count(ciudadpa) as totaldestino2 from reportecancelado where ciudadpa IN ('IRAPUATO','GUANAJUATO') and fecha BETWEEN  '$fecha1' AND '$fecha2' group by ciudadpa order by ciudadpa")

               or die("Error en la consulta SQL");




 echo "<table align='center' width='600' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>Destino</div></td>
     <td align='center'>Numero de Traslados</div></td>
     
   </tr>";
   
  
$var1=0;
$num3=1;
while ($ren=pg_fetch_array ($result2))
   {

  $ciudad=$ren["ciudadpa"];

   $totaldestino2=$ren["totaldestino2"];



  echo "<tr bgcolor='#F2F2F2'>


      <td align='center'>$ciudad</td>

      <td align='center'><input name='ciudad2$num3' type='text' id='ciudad$num3'  size='5' maxlength='5' value='$totaldestino2' readonly='readonly'  /></td>

    </tr>";




$var1=$var1+$totaldestino2;
$num3 ++;
}


echo "</table><br>";
   



echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados Nivel 2</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totaln2' type='text' id='totaln2' size='5' maxlength='5' value='$var1' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";

*/









/*------------------------------------------------------------------------Reporte por Turno------------------------------------------------------------------------*/

echo "<h2>Turnos</h2>";


 $resultfem = pg_query ($conexion, "SELECT count(turno) as turnom from reportecancelado  where  estado='APROBADO' and turno='MATUTINO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

               or die("Error en la consulta SQL");




             $resultmas = pg_query ($conexion, "SELECT count(turno) as turnov from reportecancelado where estado='APROBADO' and turno='VESPERTINO'  and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");




 echo "<table align='center' width='600' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>Turno</div></td>
     <td align='center'>Numero de Traslados</div></td>


     
   </tr>";

             




while ($ren=pg_fetch_array ($resultfem))
   {

  $turnom=$ren["turnom"];

}


  echo "<tr bgcolor='#F2F2F2'>


      <td align='center'>Matutino</td>



      <td align='center'><input name='turnom' type='text' id='turnom'  size='5' maxlength='5' value='$turnom' readonly='readonly'  /></td>

    </tr>";


while ($ren=pg_fetch_array ($resultmas))
   {

  $turnov=$ren["turnov"];

}

  echo "<tr bgcolor='#F2F2F2'>




      <td align='center'>Vespertino</td>


      <td align='center'><input name='turnov' type='text' id='turnov'  size='5' maxlength='5' value='$turnov' readonly='readonly'  /></td>



    </tr>";

$totalturno=$turnom+$turnov;

echo "</table><br>";





echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>



<tr>
      <td  width='150'>Total de Traslados por Turno</td>


    <td bgcolor='#F2F2F2' width='50'><input name='totalturno' type='text' id='totalturno' size='5' maxlength='5' value='$totalturno' readonly='readonly'  /></td>

    </tr>
    
  </table><br>";




/*----------------------------------------------------------------------------FIN reporte por Turno------------------------------------------------------------------*/







/*------------------------------------------------------------------------------reporte por MEdio---------------------------------------------------------------------*/

echo "<h2>Medio</h2>";


 $resultfem = pg_query ($conexion, "SELECT count(categoriapa) as auto from reportecancelado  where   estado='APROBADO' and categoriapa='AUTOMOVIL' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

               or die("Error en la consulta SQL");




             $resultmas = pg_query ($conexion, "SELECT count(categoriapa) as flecha from reportecancelado where estado='APROBADO' and categoriapa!='AUTOMOVIL'  and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");




 echo "<table align='center' width='600' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>Medio</div></td>
     <td align='center'>Numero de Traslados</div></td>


     
   </tr>";

             




while ($ren=pg_fetch_array ($resultfem))
   {

  $auto=$ren["auto"];

}


  echo "<tr bgcolor='#F2F2F2'>


      <td align='center'>Automovil</td>



      <td align='center'><input name='auto' type='text' id='auto'  size='5' maxlength='5' value='$auto' readonly='readonly'  /></td>

    </tr>";


while ($ren=pg_fetch_array ($resultmas))
   {

  $flecha=$ren["flecha"];

}

  echo "<tr bgcolor='#F2F2F2'>




      <td align='center'>Flecha</td>


      <td align='center'><input name='flecha' type='text' id='flecha'  size='5' maxlength='5' value='$flecha' readonly='readonly'  /></td>



    </tr>";

$totalmedio=$auto+$flecha;

echo "</table><br>";





echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>



<tr>
      <td  width='150'>Total de Traslados Nivel 3</td>


    <td bgcolor='#F2F2F2' width='50'><input name='totalmedio' type='text' id='totalmedio' size='5' maxlength='5' value='$totalmedio' readonly='readonly'  /></td>

    </tr>
    
  </table><br>";




/*------------------------------------------------------------------------------Fin reporte por Medio------------------------------------------------------------------*/



/*------------------------------------------------------------------promedio------------------------------------------------------------------------------*/




echo "<h2>Promedio</h2>";






   $total = pg_query ($conexion, "select sum(total) as total from reportecancelado where  estado='APROBADO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");




 echo "<table align='center' width='600' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>Promedio</div></td>




     

   </tr>";

             




while ($ren=pg_fetch_array ($total))
   {

  $total=$ren["total"];

}


$promedio=$total/$totalesp;

  echo "<tr bgcolor='#F2F2F2'>


      <td align='center'><input name='promedio' type='text' id='promedio'  size='15' maxlength='15' value='$promedio' readonly='readonly'  /></td>

    </tr>";




echo "</table><br>";








/*-------------------------------------------------------fin promedio---------------------------------------------------------------------------------------*/

}/*llave fin del if principal de boton buscar*/




?>





</form>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
