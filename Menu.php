<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
session_start();


$boton = $_POST["boton"];
        
 $nivel=$_SESSION['seguridad'];


	if ($boton =="Traslados" )
		{
			  
                               if ($nivel ==1)
                                {
                                     header ("location:S1menu.php");
                                    
                                 }     
                              if ($nivel ==2)
                                 {
                                   header ("location:S2menu2.php");
                                     $_SESSION['seguridad'] = 2;
                                  }
				  if ($nivel ==3)
                                 {
                                   header ("location:A1Menu.php");
                                     $_SESSION['seguridad'] = 3;
                                  }
                  }     
        if ($boton =="Transportes")
                                 {
                                   
                               if ($nivel ==1)
                                {
                                     header ("location:menu6.php");
                                     $_SESSION['seguridad'] = 1;
                                 }     
                              if ($nivel ==2)
                                 {
                                   header ("location:menu8.php");
                                     $_SESSION['seguridad'] = 2;
                                  }
				  if ($nivel ==3)
                                 {
                                   header ("location:menutransportesadmon.php");
                                     $_SESSION['seguridad'] = 3;
                                  }

                                  }
				


?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Menu</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">

</head>


<body>

<div id="contenedor" align="center">

<form id="form1" name="form1" method="post" action="Menu.php">


  <div align="center">
<img src="bannertexto.png" width="1200" height="80" />
    <div align="left">Bienvenido: <? echo $_SESSION['nomb'];?> </div>
    <img src="NuevoIssste.jpg" width="160" height="150" /><br>
    <br >
    <br >
    <br >
    <br >
    <input name="boton" type="submit" id="boton" value="Traslados" />
    <p>    <br >    <br >
      <input name="boton" type="submit" id="boton" value="Transportes" />
    </p>
  </div>
</form>
<br>
<br>
<br>

<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
