<!DOCTYPE >

<?
session_start();


$boton = $_POST["boton"];
        
  


	if ($boton =="Usuarios" )
		{
			  
                               header ("location:usuarios.php");
                  }     
       if ($boton =="Costos" )
		{
			  
                               header ("location:costos.php");
                  }     
        if ($boton =="Reportes")
                                 {
                                   header ("location:A1MenuReportes.php");
                                  }
				
	if ($boton =="Salir")
                                 {
                                   session_destroy();
                                   header ("location:Login.php");
                                  }


if (($_SESSION['seguridad']!=3) or ($_SESSION['dep']!="TRASLADOS"))
{
   $mensaje = "No tiene permiso para accesar a este modulo";
                        echo "<script>";
                        echo "alert('$mensaje');";  
                        echo "window.location = 'login.php';";
                        echo "</script>";  

}

else 
{

?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Menu</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">

</head>


<body>

<div id="contenedor" align="center">

<form id="form1" name="form1" method="post" action="A1Menu.php">


  <div align="center">
<img src="btr.png" width="1200" height="80" />
    <div align="left">Bienvenido: <? echo $_SESSION['nomb'];?> </div>
    <img src="NuevoIssste.jpg" width="160" height="150" /><br>
    <br >
  <br >
    <input name="boton" type="submit" id="boton" value="Reportes" />
    <br>
  <br >
    <input name="boton" type="submit" id="boton" value="Usuarios" />
    <br>  
  <br >
    <input name="boton" type="submit" id="boton" value="Costos" />
    <br> 
  <br >
    <input name="boton" type="submit" id="boton" value="Salir" />
  </div>
</form>
<br>
<br>


<?
}
?>
<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
