<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Cancalar Orden</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">


</head>

<script type="text/javascript">

function validar_numero(e)
{ //
tecla = (document.all) ? e.keyCode : e.which; //
if ((tecla==8) || (tecla==0)) return true; //
patron =/\d/ //
te = String.fromCharCode(tecla); //
return patron.test(te); //
} //Para nmero


</script>



<?php
$orden=$_POST["orden"];
$boton=$_POST["boton"];


if ($boton=="Cancelar Orden")
{
	 $conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or
      die ("Fallo en el establecimiento de la conexión");



		$sentencia3="update ordentraslado set estado='CANCELADO' where noorden=$orden";


		 pg_query($sentencia3); 


			$mensaje2="Orden cancelada";
              echo "<script>";
                        echo "alert('$mensaje2');";  
                        echo "window.location = 'S1cancelar.php';";
                        echo "</script>";  
}


if ($boton=="Regresar al Menu")
{

Header ("location:S1menu.php");

}

?>
<body>

<div id="contenedor" align="center">

<form id="form1" name="form1" method="post" action="S1cancelar.php">

<img src="btr.png" width="1200" height="80" />

  <p>&nbsp;</p>
<br>
<br>
  <table width="323" border="0" align="center">
    <tr>
      <td colspan="2"><div align="center">No. de orden a cancelar:
        <input name="orden" type="text" id="orden" size="8" maxlength="8" onkeypress="return validar_numero(event)"/> 
      </div>
        <label></label></td>
      </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="156"><div align="center">
        <label>
        <input name="boton" type="submit" id="boton" value="Cancelar Orden" />
        </label>
      </div></td>
      <td width="157"><div align="center">
        <label>
        <input name="boton" type="submit" id="boton" value="Regresar al Menu" />
        </label>
      </div></td>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
</form>
<br>
<br>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 

</div>

</div>

</body>
</html>
