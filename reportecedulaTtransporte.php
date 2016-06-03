<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
session_start();


if ($_SESSION['seguridad']!=1)
{
   $mensaje = "No tiene permiso de accesar a este modulo";
                        echo "<script>";
                        echo "alert('$mensaje');";  
                        echo "window.location = 'login.php';";
                        echo "</script>";  

}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Reporte</title>
<script language='javascript' src="popcalendar.js"></script> 
<link rel="STYLESHEET" type="text/css" href="estilo.css">
</head>

<body>
<?

$boton = $_POST["boton"];
$cedula = $_POST ["nocedula"];
$cedula1 = $_POST ["nocedula1"];


if ($boton =="Regresar al Menu" )
   {
  header("location:menurpttrans.php");
  }
 
if ($boton =="Imprimir" )
   {
  header("location:reportetiempotransporte.php?nocedula=$cedula&nocedula1=$cedula1");
  }
?>
<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="reportecedulaTtransporte.php">
  <p><img src="btr.png" width="1200" height="80" /></p>
  <table width="1341" border="0">
    <tr>
      <td width="116">&nbsp;</td>
      <td width="199"><label>Fecha inicial
        <input name="nocedula" type="text" id="dateArrival" onClick="popUpCalendar(this, form1.dateArrival, 'yyyy-mm-dd');" size="10">
		 
      </label></td>
      <td width="787"><input name="boton" type="submit" id="boton" value="Imprimir" />
        <label>
        <input name="boton" type="submit" id="boton" value="Regresar al Menu" />
      </label></td>
      <td width="107">&nbsp;</td>
      <td width="110">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label></label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>      
        <label>Fecha Final
        <input name="nocedula1" type="text" id="dateArrival1" onClick="popUpCalendar(this, form1.dateArrival1, 'yyyy-mm-dd');" size="10">
		</label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
