<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte por Nivel</title>
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
<form id="form1" name="form1" method="post" action="S1ReporteNivel.php">
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
    <td colspan="2"><div align="center">

      <label>
      <input name="boton" type="submit" id="boton" value="Regresar al Menu" />
      </label>
    </div></td>
    <td colspan="2"><div align="center">
      <label>
      <input name="boton" type="submit" id="boton" value="Buscar" />
      </label>
    </div></td>
   <!-- <td><div align="center">
      <label>
      <input name="boton" type="submit" id="boton" value="Imprimir" />
      </label>
    </div></td>-->
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


/*inicia la busqueda de cada nivel*/



   if ($boton=="Buscar")
{


/*inicia la busqueda de pirmer nivel Gudalajara*/

            if ($radio=="grl")
             {


               $resultguadalajara = pg_query ($conexion, "SELECT * from reportecancelado  where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUADALAJARA' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

               or die("Error en la consulta SQL");




             $resguadalajara = pg_query ($conexion, "select sum(total) as total from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUADALAJARA' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
             
            
            
            $rguadalajara = pg_query ($conexion, "select count(total) as tras from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUADALAJARA' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
              }


             if ($radio=="ac")
             {


             $resultguadalajara = pg_query ($conexion, "SELECT *from reportecancelado where subac not in (0.00)  and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUADALAJARA' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");
             
            $resguadalajara = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO'  and ciudadpa='GUADALAJARA' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 $rguadalajara = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUADALAJARA' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
                        
                        

             }



             if ($radio=="sn")
             {


            $resultguadalajara = pg_query ($conexion, "SELECT * from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUADALAJARA' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");



             $resguadalajara = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUADALAJARA' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 
             $rguadalajara = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUADALAJARA' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");


              }

/*termina la busqueda por nivel de Guadalajara*/



/*Inicia la busqueda por nivel de Leon*/


            if ($radio=="grl")
             {


               $resultleon = pg_query ($conexion, "SELECT * from reportecancelado  where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='LEON' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

               or die("Error en la consulta SQL");




             $resleon = pg_query ($conexion, "select sum(total) as total from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='LEON' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
             
            
            
            $rleon = pg_query ($conexion, "select count(total) as tras from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='LEON' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
              }


             if ($radio=="ac")
             {


             $resultleon = pg_query ($conexion, "SELECT *from reportecancelado where subac not in (0.00)  and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='LEON' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");
             
            $resleon = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO'  and ciudadpa='LEON' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 $rleon = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='LEON' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
                        
                        

             }



             if ($radio=="sn")
             {


            $resultleon = pg_query ($conexion, "SELECT * from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='LEON' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");



             $resleon = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='LEON' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 
             $rleon = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='LEON' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");





 }



/*termina la busqueda por nivel de Leon*/







/*Inicia la busqueda por nivel de Mexico*/


            if ($radio=="grl")
             {


               $resultmexico = pg_query ($conexion, "SELECT * from reportecancelado  where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='MEXICO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

               or die("Error en la consulta SQL");




             $resmexico = pg_query ($conexion, "select sum(total) as total from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='MEXICO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
             
            
            
            $rmexico = pg_query ($conexion, "select count(total) as tras from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='MEXICO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
              }


             if ($radio=="ac")
             {


             $resultmexico = pg_query ($conexion, "SELECT *from reportecancelado where subac not in (0.00)  and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='MEXICO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");
             
            $resmexico = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO'  and ciudadpa='MEXICO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 $rmexico = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='MEXICO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
                        
                        

             }



             if ($radio=="sn")
             {


            $resultlmexico = pg_query ($conexion, "SELECT * from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='MEXICO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");



             $resmexico = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='MEXICO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 
             $rmexico = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='MEXICO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");





 }



/*Inicia la busqueda por nivel de Mexico*/





/*inicia la busqueda de pirmer nivel Queretaro*/

            if ($radio=="grl")
             {


               $resultqueretaro = pg_query ($conexion, "SELECT * from reportecancelado  where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='QUERETARO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

               or die("Error en la consulta SQL");




             $resqueretaro = pg_query ($conexion, "select sum(total) as total from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='QUERETARO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
             
            
            
            $rqueretaro = pg_query ($conexion, "select count(total) as tras from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='QUERETARO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
              }


             if ($radio=="ac")
             {


             $resultqueretaro = pg_query ($conexion, "SELECT *from reportecancelado where subac not in (0.00)  and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='QUERETARO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");
             
            $resqueretaro = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO'  and ciudadpa='QUERETARO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 $rqueretaro = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='QUERETARO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
                        
                        

             }



             if ($radio=="sn")
             {


            $resultqueretaro = pg_query ($conexion, "SELECT * from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='QUERETARO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");



             $resqueretaro = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='QUERETARO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 
             $rqueretaro = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='QUERETARO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");


              }

/*termina la busqueda por nivel de Queretaro*/






/*inicia la busqueda de pirmer nivel Guanajuato*/

            if ($radio=="grl")
             {


               $resultguanajuato = pg_query ($conexion, "SELECT * from reportecancelado  where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUANAJUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

               or die("Error en la consulta SQL");




             $resguanajuato = pg_query ($conexion, "select sum(total) as total from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUANAJUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
             
            
            
            $rguanajuato = pg_query ($conexion, "select count(total) as tras from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUANAJUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
              }


             if ($radio=="ac")
             {


             $resultguanajuato = pg_query ($conexion, "SELECT *from reportecancelado where subac not in (0.00)  and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUANAJUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");
             
            $resguanajuato = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO'  and ciudadpa='GUANAJUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 $rguanajuato = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUANAJUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
                        
                        

             }



             if ($radio=="sn")
             {


            $resultguanajuato = pg_query ($conexion, "SELECT * from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUANAJUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");



             $resguanajuato = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUANAJUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 
             $rguanajuato = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='GUANAJUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");


              }

/*termina la busqueda por nivel de Guadalajara*/






/*inicia la busqueda de pirmer nivel Irapuato*/

            if ($radio=="grl")
             {


               $resultirapuato = pg_query ($conexion, "SELECT * from reportecancelado  where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='IRAPUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

               or die("Error en la consulta SQL");




             $resirapuato = pg_query ($conexion, "select sum(total) as total from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='IRAPUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
             
            
            
            $rirapuato = pg_query ($conexion, "select count(total) as tras from reportecancelado where unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='IRAPUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
              }


             if ($radio=="ac")
             {


             $resultirapuato = pg_query ($conexion, "SELECT *from reportecancelado where subac not in (0.00)  and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='IRAPUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");
             

            $resirapuato = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO'  and ciudadpa='IRAPUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 $rirapuato = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac not in (0.00) and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='IRAPUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
                        
                        

             }



             if ($radio=="sn")
             {


            $resultirapuato = pg_query ($conexion, "SELECT * from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='IRAPUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2' order by fecha")

             or die("Error en la consulta SQL");



             $resirapuato = pg_query ($conexion, "select sum(total) as total from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='IRAPUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");
			 
			 
			 
             $rirapuato = pg_query ($conexion, "select count(total) as tras from reportecancelado where subac=0.00 and unidadp='$_SESSION[umf]' and estado='APROBADO' and ciudadpa='IRAPUATO' and Fecha BETWEEN '$fecha1' AND '$fecha2'")

             or die("Error en la consulta SQL");


              }

/*termina la busqueda por nivel de Queretaro*/






/*termina la busqueda de cada nivel*/






/*
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


echo "</table><br>";*/
   
  


 
 ?>
</p>
</div>

<?php

/*Calcular numero de traslados, costo y promedio de los niveles*/


/*calcular total de traslados Gudadalajara*/

while ($ren=pg_fetch_array ($rguadalajara))
   {

   $tguadalajara=$ren["tras"];


}



echo "<br><div aling='center'><h2>3er Nivel</div></h2><br>";


echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados Guadalajara</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$tguadalajara' readonly='readonly'  /></td>
    </tr>
    

  </table><br>";

/*fin de total de Guadalajara*/


/*calcular costo total de Guadalajara

while ($reng=pg_fetch_array ($resguadalajara))
   {

   $sumaguadalajara=$reng["total"];



}


echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='80' >Total</td>

    <td bgcolor='#F2F2F2'  width='100'><input name='total' type='text' id='total' size='10' maxlength='10' value='$$sumaguadalajara' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";
/* fin de costo Gudalajara*/


/*promedio de traslados Guadalajara

$promedioguadalajara=$sumaguadalajara/$tguadalajara;

echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>



<tr>

      <td  width='80' >Promedio</td>



    <td bgcolor='#F2F2F2'  width='100'><input name='promedio' type='text' id='promedio' size='10' maxlength='10' value='$promedioguadalajara' readonly='readonly'  /></td>

    </tr>

    

  </table>";

/*fin promedio de Gudalajara*/





/*calcular total de traslados Leon*/

while ($ren=pg_fetch_array ($rleon))
   {

   $tleon=$ren["tras"];


}




echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados Leon</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$tleon' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";

/*fin de total de Leon*/


/*calcular costo total de Leon

while ($reng=pg_fetch_array ($resleon))
   {

   $sumaleon=$reng["total"];



}


echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='80' >Total</td>

    <td bgcolor='#F2F2F2'  width='100'><input name='total' type='text' id='total' size='10' maxlength='10' value='$$sumaleon' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";
/* fin de costo Leon*/


/*promedio de traslados Leon

$promedioleon=$sumaleon/$tleon;

echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>



<tr>

      <td  width='80' >Promedio</td>



    <td bgcolor='#F2F2F2'  width='100'><input name='promedio' type='text' id='promedio' size='10' maxlength='10' value='$promedioleon' readonly='readonly'  /></td>

    </tr>

    

  </table>";

/*fin promedio de Leon*/






/*calcular total de traslados Mexico*/

while ($ren=pg_fetch_array ($rmexico))
   {

   $tmexico=$ren["tras"];


}




echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados Mexico</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$tmexico' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";

/*fin de total de Mexico*/


/*calcular costo total de Mexico

while ($reng=pg_fetch_array ($resmexico))
   {

   $sumamexico=$reng["total"];



}


echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='80' >Total</td>

    <td bgcolor='#F2F2F2'  width='100'><input name='total' type='text' id='total' size='10' maxlength='10' value='$$sumamexico' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";
/* fin de costo Mexico*/


/*promedio de traslados Mexico

$promediomexico=$sumamexico/$tmexico;

echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>



<tr>

      <td  width='80' >Promedio</td>



    <td bgcolor='#F2F2F2'  width='100'><input name='promedio' type='text' id='promedio' size='10' maxlength='10' value='$promediomexico' readonly='readonly'  /></td>

    </tr>

    

  </table>";

/*fin promedio de Mexico*/







/*calcular total de traslados Queretaro*/

while ($ren=pg_fetch_array ($rqueretaro))
   {

   $tqueretaro=$ren["tras"];


}




echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados Queretaro</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$tqueretaro' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";

/*fin de total de Queretaro*/


/*calcular costo total de Queretaro

while ($reng=pg_fetch_array ($resqueretaro))
   {

   $sumaqueretaro=$reng["total"];



}


echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='80' >Total</td>

    <td bgcolor='#F2F2F2'  width='100'><input name='total' type='text' id='total' size='10' maxlength='10' value='$$sumaqueretaro' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";
/* fin de costo Queretaro*/


/*promedio de traslados Queretaro

$promedioqueretaro=$sumaqueretaro/$tqueretaro;

echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>



<tr>

      <td  width='80' >Promedio</td>



    <td bgcolor='#F2F2F2'  width='100'><input name='promedio' type='text' id='promedio' size='10' maxlength='10' value='$promedioqueretaro' readonly='readonly'  /></td>

    </tr>

    

  </table>";

/*fin promedio de Queretaro*/


$nivel3=$tqueretaro+$tmexico+$tguadalajara+$tleon;


echo "<table class='tabla' width='300' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='250'>Total de Traslados Tercer Nivel</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$nivel3' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";



echo "<br><div aling='center'><h2>2do Nivel</div></h2><br>";

/*calcular total de traslados Guanajuato*/

while ($ren=pg_fetch_array ($rguanajuato))
   {

   $tguanajuato=$ren["tras"];


}




echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados Guanajuato</td>

    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$tguanajuato' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";

/*fin de total de Guanajuato*/


/*calcular costo total de Guanajuato

while ($reng=pg_fetch_array ($resguanajuato))
   {

   $sumaguanajuato=$reng["total"];



}


echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='80' >Total</td>

    <td bgcolor='#F2F2F2'  width='100'><input name='total' type='text' id='total' size='10' maxlength='10' value='$$sumaguanajuato' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";
/* fin de costo Guanajuato*/


/*promedio de traslados Guanajuato

$promedioguanajuato=$sumaguanajuato/$tguanajuato;

echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>



<tr>

      <td  width='80' >Promedio</td>



    <td bgcolor='#F2F2F2'  width='100'><input name='promedio' type='text' id='promedio' size='10' maxlength='10' value='$promedioguanajuato' readonly='readonly'  /></td>

    </tr>

    

  </table>";

/*fin promedio de Guanajuato*/





/*calcular total de traslados Irapuato*/

while ($ren=pg_fetch_array ($rirapuato))
   {

   $tirapuato=$ren["tras"];


}




echo "<table class='tabla' width='400' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados Irapuato</td>


    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$tirapuato' readonly='readonly'  /></td>
    </tr>
    

  </table><br>";

/*fin de total de irapuato*/


/*calcular costo total de irapuato

while ($reng=pg_fetch_array ($resirapuato))
   {

   $sumairapuato=$reng["total"];



}


echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>


<tr>
      <td  width='80' >Total</td>


    <td bgcolor='#F2F2F2'  width='100'><input name='total' type='text' id='total' size='10' maxlength='10' value='$$sumairapuato' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";
/* fin de costo irapuato*/


/*promedio de traslados irapuato

$promedioirapuato=$sumairapuato/$tirapuato;

echo "<table class='tabla' width='180' border='1' align='center' bgcolor='#FF9900'>




<tr>

      <td  width='80' >Promedio</td>




    <td bgcolor='#F2F2F2'  width='100'><input name='promedio' type='text' id='promedio' size='10' maxlength='10' value='$promedioirapuato' readonly='readonly'  /></td>


    </tr>
    


  </table>";

/*fin promedio de Queretaro*/



/*fin de calculo de numero de traslados, costo y promedio de los niveles*/



/*suma total de traslados de 2do nivel*/

$nivel2=$tirapuato+$tguanajuato;

echo "<table class='tabla' width='300' border='1' align='center' bgcolor='#FF9900'>

<tr>
      <td  width='250'>Total de Traslados Segundo Nivel</td>


    <td bgcolor='#F2F2F2' width='50'><input name='totalt' type='text' id='totalt' size='5' maxlength='5' value='$nivel2' readonly='readonly'  /></td>
    </tr>
    

  </table><br>";

/* fin suma total de traslados de 2do nivel*/

}
?>

</form>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
