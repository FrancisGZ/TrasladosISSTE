<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuarios</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">


<SCRIPT LANGUAGE="JavaScript">

function conMayusculas(field) {  
field.value = field.value.toUpperCase(); 
    }  

 function putFocus(formInst, elementInst) {
  if (document.forms.length > 0) {
   document.forms[formInst].elements[elementInst].focus();
  }
 }
</script>

</head>

<body onLoad="putFocus(0,1);">
<?php

$idusr = $_GET["idusuario"];
$nomb = $_GET["nombre"];
$usr = $_GET["usuario"];
$cont = $_GET["contrasena"];
$niv = $_GET["nivel"];
$cli = $_GET["clinica"];
$dep = $_GET["departamento"];


?>



<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="usuarioacciontransporte.php">
<img src="bts.png" width="1200" height="80" />
<br />
<br />
<table width="453" >
  <tr>
    <td width="62">&nbsp;</td>
    <td width="68">Id Usuario:</td>
    <td width="150"><label>
      <input name="idusuario" type="text" size="2" maxlength="2" readonly="readonly"  value="<? echo $idusr ?>" />
    </label></td>
    <td width="153">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nombre:</td>
    <td><label>
      <input name="nombre" type="text" size="25" maxlength="30" value="<? echo $nomb ?>" onChange="conMayusculas(this)"/>
    </label></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Usuario:</td>
    <td><label>
      <input name="usuario" type="text" size="20" maxlength="20" value="<? echo $usr ?>" />
    </label></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Contrase&ntilde;a:</td>
    <td><label>
      <input name="contrasena" type="text" size="20" maxlength="20" value="<? echo $cont ?>"/>
    </label></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nivel De Acceso</td>
    <td><label>
      <input name="nivel" type="text" size="2" maxlength="2" value="<? echo $niv ?>" />
    </label></td>
    <td>&nbsp;</td>
    </tr>
<tr>
    <td>&nbsp;</td>
    <td>Clinica</td>
    <td><label>
      <input name="clinica" type="text" size="25" maxlength="25" value="<? echo $cli ?>" onChange="conMayusculas(this)"/>
    </label></td>
    <td>&nbsp;</td>
    </tr>
<tr>
    <td>&nbsp;</td>
    <td>Departamento</td>
    <td><label>
      <input name="departamento" type="text" size="25" maxlength="25" value="<? echo $dep ?>" onChange="conMayusculas(this)"/>
    </label></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="boton" type="submit" id="boton" value="Agregar" /></td>
    <td><div align="center">
      <label></label>
      <input name="boton" type="submit" id="boton" value="Modificar" />
    </div></td>
    <td colspan="2"><label>
      <input name="boton" type="submit" id="boton" value="Borrar" />
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

$result = pg_query ($conexion, "Select * from usuarios where departamento='TRANSPORTES' order by idusuario")

             or die("Error en la consulta SQL");

 echo"<table align='center' width='970' border='1' bgcolor='#FF9900'> 
    <tr>
     <td><div align='center'>Id Usuario</div></td>
     <td><div align='center'>Nombre</div></td>
     <td><div align='center'>Usuario</div></td>
     <td><div align='center'>Contrasena</div></td>
     <td><div align='center'>Nivel De Acceso</div></td>
 <td><div align='center'>Clinica</div></td>
 <td><div align='center'>Departamento</div></td>
    <td>&nbsp;</td>
  </tr>";


while ($renglon=pg_fetch_array ($result))
   {

   $id=$renglon["idusuario"];

   $nombre=$renglon ["nombre"];

   $usuario=$renglon ["usuario"];

   $contrasena=$renglon ["contrasena"];

   $nivelacce=$renglon["nivelacceso"];

   $nomunidad=$renglon["nomunidad"];

  $depto=$renglon["departamento"];


 echo "<tr bgcolor='#F2F2F2'>
    <td align='center'>$id</td>

      <td align='center'>$nombre</td>

      <td align='center'>$usuario</td>

      <td align='center'>$contrasena</td>

      <td align='center'>$nivelacce</td>

      <td align='center'>$nomunidad</td>
      
      <td align='center'>$depto</td>

	  <td align='center'><a href='usuariostransporte.php?idusuario=$id&nombre=$nombre&usuario=$usuario&contrasena=$contrasena&nivel=$nivelacce&clinica=$nomunidad&departamento=$depto'>Editar</a></td>
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
