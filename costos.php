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

$idcost = $_GET["idcosto"];
$cli = $_GET["clinica"];
$categoria = $_GET["categoria"];
$ciu = $_GET["ciudad"];
$cost = $_GET["costo"];


?>



<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="costosaccion.php">
<img src="btr.png" width="1200" height="80" />
<br />
<br />
<table width="453" >
  <tr>
    <td width="62">&nbsp;</td>
    <td width="68">Id Costo </td>
    <td width="150"><label>
      <input name="idcosto" type="text" size="2" maxlength="2" readonly="readonly"  value="<? echo $idcost ?>" />
    </label></td>
    <td width="153">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Origen:</td>
    <td><label>
      <input name="clinica" type="text" size="25" maxlength="25" value="<? echo $cli ?>" onChange="conMayusculas(this)"/>
    </label></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Categoria:</td>
    <td><label>
      <input name="categoria" type="text" size="10" maxlength="10" value="<? echo $categoria ?>" onChange="conMayusculas(this)"/>
    </label></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Destino:</td>
    <td><label>
      <input name="ciudad" type="text" size="25" maxlength="20" value="<? echo $ciu ?>" onChange="conMayusculas(this)"/>
    </label></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Costo:</td>
    <td><label>
      <input name="costo" type="text" size="10" maxlength="10" value="<? echo $cost ?>" />
    </label></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="boton" type="submit" id="boton2" value="Agregar" /></td>
    <td><div align="center">
      <label></label>
      <input name="boton" type="submit" id="boton" value="Modificar" />
    </div></td>
    <td colspan="2"><label>
      <input name="boton" type="submit" id="Boton" value="Borrar" />
      <input name="boton" type="submit" id="boton" value="Limpiar" />
      <input name="boton" type="submit" id="boton" value="Regresar" />

    </label></td>
    </tr>
</table>
<br />
<br/>
<?php

  
  $conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or



      die ("Fallo en el establecimiento de la conexi&oacute;n");

$result = pg_query ($conexion, "Select * from costos  order by idcosto")

             or die("Error en la consulta SQL");

 echo"<table align='center' width='970' border='1' bgcolor='#FF9900'> 
    <tr>
     <td><div align='center'>Id Costo</div></td>
     <td><div align='center'>Origen</div></td>
     <td><div align='center'>Categoria</div></td>
     <td><div align='center'>Destino</div></td>
     <td><div align='center'>Costo</div></td>
    <td>&nbsp;</td>
  </tr>";


while ($renglon=pg_fetch_array ($result))
   {

   $id=$renglon["idcosto"];

   $clinica=$renglon ["nomunidad"];

   $catego=$renglon ["nomcategoria"];

   $ciudad=$renglon ["nomciudad"];

   $costo=$renglon["costo"];


 echo "<tr bgcolor='#F2F2F2'>
    <td align='center'>$id</td>

      <td align='center'>$clinica</td>

      <td align='center'>$catego</td>

      <td align='center'>$ciudad</td>

      <td align='center'>$costo</td>

	  <td align='center'><a href='costos.php?idcosto=$id&clinica=$clinica&categoria=$catego&ciudad=$ciudad&costo=$costo'>Editar</a></td>
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
