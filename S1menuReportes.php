<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
session_start();



$boton = $_POST["boton"];
        
  


	if ($boton =="Reporte General" )
		{
			  
                               header ("location:S1ReporteGeneral.php");
                  }     

        if ($boton =="Reporte por Cedula")
                                 {
                                   header ("location:S1ReporteCedula.php");
                                  }
				
if ($boton =="Reporte Fecha")
                                 {
                                   header ("location:S1ReporteFecha2.php");
                                  }


				
if ($boton =="Reporte por Sexo")
                                 {
                                   header ("location:S1ReporteMF.php");
                                  }


        if ($boton =="Regresar al Menu")
                                 { 
                                   header ("location:S1menu.php");
				}

if ($boton =="Reporte Cancelados")
                                 { 
                                   header ("location:S1ReporteCancelados.php");
                                         
                                 }       


if ($boton =="Reporte por Nivel")
                                 { 
                                   header ("location:S1ReporteNivel.php");
                                         
                                 }     


if ($boton =="Reporte por Especialidad")
                                 { 
                                   header ("location:S1ReporteEspecialidad.php");
                                         
                                 }     


if ($boton =="Reporte por Turno")
                                 { 
                                   header ("location:S1ReporteTurno.php");
                                         
                                 }     


if ($boton =="Reporte por Tipo")
                                 { 
                                   header ("location:S1ReporteVez.php");
                                         
                                 }     

	if ($boton =="Salir")
                                 {
                                   session_destroy();
                                   header ("location:Login.php");
                                  }



if ($_SESSION['seguridad']!=1)
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

<link rel="STYLESHEET" type="text/css" href="estilo.css">
</head>


<body>

<div id="contenedor" align="center">
<form id="form1" name="form1" method="post" action="S1menuReportes.php">

  <img src="btr.png" width="1200" height="80" />
  <div align="center"><label>
    <div align="left">Bienvenido: <? echo $_SESSION['nomb'];?> </div>
  </label> 
    <label><img src="NuevoIssste.jpg" width="160" height="150" /><br />
    <br />
    <input name="boton" type="submit" id="boton" value="Reporte General" />
    </label>
    <p>
      <label>
      <input name="boton" type="submit" id="boton2" value="Reporte por Cedula" />
      </label>
    </p>
<p>
      <label>
      <input name="boton" type="submit" id="boton" value="Reporte Fecha" />
      </label>
    </p>

<p>
      <label>
      <input name="boton" type="submit" id="boton" value="Reporte por Sexo" />
      </label>
    </p>

<p>
      <label>
      <input name="boton" type="submit" id="boton" value="Reporte por Turno" />
      </label>
    </p>

<p>
      <label>
      <input name="boton" type="submit" id="boton" value="Reporte por Tipo" />
      </label>
    </p>


<p>
      <label>
      <input name="boton" type="submit" id="boton" value="Reporte por Nivel" />
      </label>
    </p>



<p>
      <label>
      <input name="boton" type="submit" id="boton" value="Reporte por Especialidad" />
      </label>
    </p>
<p>
      <label>
      <input name="boton" type="submit" id="boton" value="Reporte Cancelados" />
      </label>
    </p>
    <p>
      <label>
      <input name="boton" type="submit" id="boton" value="Regresar al Menu" />
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
