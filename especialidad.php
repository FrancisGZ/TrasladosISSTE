<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Costos</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">


<SCRIPT LANGUAGE="JavaScript">



 function putFocus(formInst, elementInst) {
  if (document.forms.length > 0) {
   document.forms[formInst].elements[elementInst].focus();
  }
 }


function conMayusculas(field) {  
field.value = field.value.toUpperCase(); 
    }  
</script>

</head>

<body onLoad="putFocus(0,1);">
<?php

$idesp = $_GET["idespecialidad"];
$esp = $_GET["especialidad"];



?>



<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="especialidadaccion.php">
<img src="btr.png" width="1200" height="80" />
<br>
<br>
<br>
<br>
<table width="425" >
  <tr>
    <td width="120">Id Especialidad:</td>
    <td width="150"><label>
      <input name="idespecialidad" type="text" size="2" maxlength="2" readonly="readonly"  value="<? echo $idesp ?>" />
    </label></td>
    <td width="133">&nbsp;</td>
    </tr>
  <tr>
    <td>Especialidad:</td>
    <td><label>
      <input name="especialidad" type="text" size="25" maxlength="25" value="<? echo $esp ?>" onChange="conMayusculas(this)"/>
    </label></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
      <label></label>
      <input name="boton" type="submit" id="boton" value="Agregar" />
      <input name="boton" type="submit" id="boton" value="Modificar" />
      <input name="boton" type="submit" id="Boton" value="Borrar" />
      <input name="boton" type="submit" id="boton" value="Limpiar" /> 
      <input name="boton" type="submit" id="boton" value="Regresar" />
</div>      
      <label></label></td>
    </tr>
</table>
<br />
<br/>
<?php

  
  $conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or



      die ("Fallo en el establecimiento de la conexi&oacute;n");

$result = pg_query ($conexion, "Select * from especialidad  order by idespecialidad")

             or die("Error en la consulta SQL");

 echo"<table align='center' width='600' border='1' bgcolor='#FF9900'> 
    <tr>
     <td><div align='center'>Id Especialidad</div></td>
     <td><div align='center'>Especialidad</div></td>
     
    <td>&nbsp;</td>
  </tr>";


while ($renglon=pg_fetch_array ($result))
   {

   $id=$renglon["idespecialidad"];

   $especialidad=$renglon ["especialidad"];

  


 echo "<tr bgcolor='#F2F2F2'>
    <td align='center'>$id</td>

      <td align='center'>$especialidad</td>

      

	  <td align='center'><a href='especialidad.php?idespecialidad=$id&especialidad=$especialidad'>Editar</a></td>
  </tr>";

}
echo "</table>";

?>

</form>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>

</body>
</html>
