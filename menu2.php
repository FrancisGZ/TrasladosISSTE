<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
session_start();



$boton = $_POST["boton"];
        
  


	if ($boton =="Reporte General" )
		{
			  
                               header ("location:rptgeneral2.php");
                  }     
        if ($boton =="Reporte por Cedula")
                                 {
                                   header ("location:rptcedula2.php");
                                  }
				
if ($boton =="Reporte Fecha")
                                 {
                                   header ("location:reportecedulaT2.php");
                                  }
	if ($boton =="Salir")
                                 {
                                   session_destroy();
                                   header ("location:login.php");
                                  }



if ($_SESSION['seguridad']!=2)
{
   $mensaje = "No tiene permiso para accesar a este modulo";
                        echo "<script>";
                        echo "alert('$mensaje');";  
                        echo "window.location = 'Login.php';";
                        echo "</script>";  

}

else 
{

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Reportes</title>
</head>
<link rel="STYLESHEET" type="text/css" href="estilo.css">

<body>

<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="menu2.php">


  <img src="bannertexto.png" width="1200" height="80" />
  <div align="center"><label>
    <div align="left">Bienvenido: <? echo $_SESSION['nomb'];?> </div>
  </label> 
    <label><img src="NuevoIssste.jpg" width="160" height="150" /><br />
    <br />
    <input name="boton" type="submit" id="boton" value="Reporte General" />
    </label>
    <p>
      <label>
      <input name="boton" type="submit" id="boton" value="Reporte por Cedula" />
      </label>
    </p>
    <p>
      <label>
      <input name="boton" type="submit" id="boton" value="Reporte Fecha" />
      </label>
    </p>
  <p>
      <label>
      <input name="boton" type="submit" id="boton" value="Salir" />
      </label>
    </p>
  </div>
</form>
<?
}
?>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
