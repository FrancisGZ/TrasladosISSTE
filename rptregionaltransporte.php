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
$unidad = $_POST["umf"];

if ($boton =="Regresar al Menu" )
   {
  header("location:menurpttransportes.php");
  }
 

if ($boton =="Limpiar" )
   {
  header("location:rptregionaltransporte.php");
  }


if ($boton =="Imprimir" )
   {
  header("location:rptgrljefetransportes.php?umf=$unidad");
  }


  if ($boton =="Salir" )
    {  
     
    session_destroy();
    header ("location:login.php");

    }

?>

<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="rptregionaltransporte.php">
<p align="center"><img src="bts.png" width="1200" height="80" /></p>
<p align="center">&nbsp;</p>
<table align="center" width="388" border="0">
  <tr>
    <td colspan="4"><div align="center">
   
      Unidad Medica
     

<?


$conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or



      die ("Fallo en el establecimiento de la conexi&oacute;n");


if ($unidad!="")
{
echo "<select name='umf'>";
echo"<option>$unidad</option>";
echo"<option>GENERAL</option>"; 

 $result = pg_query ($conexion, "select * from unidadmedica where nomunidad not in ('$unidad')" )




             or die("Error en la consulta SQL");



while($vb=pg_fetch_array($result)){

?>

<option value="<? echo $vb[nomunidad];?>"> <? echo $vb[nomunidad];?>

<?}echo"</option>
      </select>";



}
else{
  echo "<select name='umf'>";
  echo"<option></option>";
  echo"<option>GENERAL</option>";



 $result = pg_query ($conexion, "select * from unidadmedica" )




             or die("Error en la consulta SQL");



while($vb=pg_fetch_array($result)){

?>

<option value="<? echo $vb[nomunidad];?>"> <? echo $vb[nomunidad];?>

<?}echo"</option>
      </select>";
}?>




 
    </div></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">

     
      <input name="boton" type="submit" id="boton" value="Regresar al Menu" />  
      <input name="boton" type="submit" id="boton" value="Limpiar" /> 
      <input name="boton" type="submit" id="boton" value="Buscar" />
      <input name="boton" type="submit" id="boton" value="Imprimir" />
    </div>    </td>
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


if ($unidad=="GENERAL")
{

               


                 $result = pg_query ($conexion, "SELECT * from reportetransporte order by fecha")

                  or die("Error en la consulta SQL");


                $re = pg_query ($conexion, "select sum(costo) as total from reportetransporte")

                or die("Error en la consulta SQL");

           

                  $r = pg_query ($conexion, "select count(costo) as tras from reportetransporte")

                 or die("Error en la consulta SQL");


            

               


}

else {

            


                 $result = pg_query ($conexion, "SELECT * from reportetransporte where nomunidad='$unidad' order by fecha")

                  or die("Error en la consulta SQL");


                $re = pg_query ($conexion, "select sum(costo) as total from reportetransporte where nomunidad='$unidad'")

                or die("Error en la consulta SQL");

           

                  $r = pg_query ($conexion, "select count(costo) as tras from reportetransporte where  nomunidad='$unidad'")

                 or die("Error en la consulta SQL");


               
}


while ($renn=pg_fetch_array ($r))
   {

   $t=$renn["tras"];


}




while ($rengg=pg_fetch_array ($re))
   {

   $suma=$rengg["total"];


}




 
 echo "<table class='tabla' align='center' width='970' border='1' bgcolor='#FF9900' >
   <tr >
     <td align='center'>Id Orden</div></td>
     <td align='center'>Fecha</div></td>
     <td align='center'>Cedula</div></td>
     <td align='center'>Nombre</div></td>
     <td align='center'>Apellido Paterno</div></td>
     <td align='center'>Apellido Materno</div></td>
     <td align='center'>Origen</div></td>
     <td align='center'>Destino</div></td>
     <td align='center'>Costo</div></td>
     <td align='center'>Num. Ambulancia</div></td>
     <td align='center'>Chofer</div></td>
     <td align='center'>Camillero</div></td>
     <td align='center'>Oxigeno</div></td>
     <td align='center'>Medico</div></td>
     <td align='center'>Elaboro</div></td>
   </tr>";
   
   
   while ($renglon=pg_fetch_array ($result))
   {

   $idorden=$renglon["idordentrans"];

   $fec=$renglon ["fecha"];

   $cedu=$renglon ["cedula"];

   $nom=$renglon ["nompasajero"];

   $paterno=$renglon["appaterno"];

   $materno=$renglon["apmaterno"];

   $origen=$renglon ["nomunidad"];

   $destino=$renglon ["nomciudad"];

   $costo=$renglon ["costo"];

   $ambulancia=$renglon ["numambulancia"];

   $chofer=$renglon ["chofer"];

   $camillero=$renglon ["camillero"];

   $oxigeno=$renglon ["oxigeno"];


   $medico=$renglon ["medico"];

   $empleado=$renglon["nomempleado"];


   echo "<tr bgcolor='#F2F2F2'>


      <td align='center'>$idorden</td>

      <td align='center'>$fec</td>

      <td align='center'>$cedu</td>

      <td align='center'>$nom</td>

      <td align='center'>$paterno</td>

      <td align='center'>$materno</td>
	  
      <td align='center'>$origen</td>

      <td align='center'>$destino</td>

      <td align='center'>$costo</td>

      <td align='center'>$ambulancia</td>

      <td align='center'>$chofer</td>

      <td align='center'>$camillero</td>

      <td align='center'>$oxigeno</td>
	  
      <td align='center'>$medico</td>

      <td align='center'>$empleado</td>



    </tr>";




}



echo "</table><br>";
   

     echo "<table class='tabla' width='200' border='1'  bgcolor='#FF9900'>

<tr>
      <td  width='150'>Total de Traslados</td>

    <td bgcolor='#F2F2F2' width='50'><input name='total' type='text' id='total' size='5' maxlength='5' value='$t' readonly='readonly'  /></td>
    </tr>
    
  </table><br>";


echo "<table class='tabla' width='180' border='1'  bgcolor='#FF9900'>

<tr>
      <td  width='80' >Total</td>

    <td bgcolor='#F2F2F2'  width='100'><input name='total' type='text' id='total' size='10' maxlength='10' value='$$suma' readonly='readonly'  /></td>
    </tr>
    
  </table>";   




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
