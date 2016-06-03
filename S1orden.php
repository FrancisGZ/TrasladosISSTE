<?
session_start();
$clinica=$_SESSION['umf'];


if ($_SESSION['seguridad']!=1)
{
   $mensaje = "No tiene permiso de accesar a este modulo";
                        echo "<script>";
                        echo "alert('$mensaje');";  
                        echo "window.location = 'Login.php';";
                        echo "</script>";  

}

else 
{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orden</title>
</head>

<link rel="STYLESHEET" type="text/css" href="estilo.css">
<style type="text/css">

DIV{


 font-size: 9pt;
}


INPUT {
font-size : 8pt; 
}

</style>
<body>
 
<?
$orden = $_POST["orden"];
$c1 = $_POST["c1"];
$c2 = $_POST["c2"];
$c3 = $_POST["c3"];
$sexo = $_POST["sexo"];
$edad = $_POST["edad"];
$categoria = $_POST["categoria"];
//$servicio = $_POST["servicio"];
$nombre = $_POST["nombre"];
$appa = $_POST["appa"];
$apma = $_POST["apma"];
$destino = $_POST["destino"];
$especialidad = $_POST["especialidad"];


$especialidad2 = $_POST["especialidad2"];

$cita = $_POST["cita"];
$vez = $_POST["vez"];
$turno = $_POST["turno"];
$nueva = $_POST["nueva"];


$nomac = $_POST["nomac"];
$appaac = $_POST["appaac"];
$apmaac = $_POST["apmaac"];
//$categoria2 = $_POST["categoria2"];
$boton = $_POST["boton"];
$usuario =$_SESSION['nomb'];

$cedula= $c1.$c2.$c3;

  if ($boton =="Regresar al Menu" )
   {
  header("location:S1menu.php");
  }
 
if ($boton =="Buscar" )
   {
  header("location:S1traslado.php?cedula=$cedula&c1=$c1&c2=$c2&c3=$c3&orden=$orden&b=1");
  }

  if ($boton =="Salir" )
    {  
     
    session_destroy();
    header ("location:Login.php");

    }

   if ($boton=="Generar Orden")
{



if ($nomac != "") {

   $destino2=$destino;
   $celaya= $clinica;

}else{

   $destino2="";
   $celaya= "";
   
}



 $conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or
      die ("Fallo en el establecimiento de la conexión");


if ($nueva=="agree"){

$sentencia9="insert into especialidad (especialidad) values ('$especialidad2')";

$especialidad=$especialidad2;
echo $especialidad;

}





$hora = (date("G:i:s"));

?>

<div id="contenedor">
<form id="form1" name="form1" method="post" action="S1reportepdf.php">
  <img src="btr.png" width="1200" height="80" />
<br>
<br>
<table width="1202" border="0" align="center" font-size="5">
    <tr>
      <td width="117">&nbsp;</td>
      <td width="111" colspan="2">No. de Orden:
        <input name="noorden" type="text" id="noorden" value="<? echo $orden ?>" readonly="readonly"  size="8" maxlength="8" /></td>
      <td width="127" colspan="2"><div>Delegacion: <strong>Guanjauato</strong></div></td>
      <td width="114" colspan="2">Clinica: <strong><? echo $clinica ?></strong></td>
      <td colspan="2"><div>Fecha:
      <input type="text" name="fecha"  id="fecha" readonly="readonly" size ="10" value="<?php echo $fecha = (date('j-n-Y')) ?>"/> </div></td>
     <td width="117"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="119">&nbsp;</td>
      <td width="114">&nbsp;</td>
      <td width="116">&nbsp;</td>
      <td width="113">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><div align="right"></div></td>
      <td colspan="2"><div align="right"></div></td>
      <td>&nbsp;</td>
      <td colspan="4"><div align="right"></div>Cedula:
        <input name="noafi1" type="text" id="noafi1" value="<? echo $c1 ?>" readonly="readonly" size="4" maxlength="4" />
        <input name="noafi2" type="text" id="noafi2" value="<? echo $c2 ?>" readonly="readonly" size="6" maxlength="6" />
        <input name="noafi3" type="text" id="noafi3" value="<? echo $c3 ?>" readonly="readonly" size="1" maxlength="1" /></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="113">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"></div></td>

     <?php
	
        
  $conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or
      die ("Fallo en el establecimiento de la conexión");


 $rs = pg_query ($conexion, "select * from tipoderechohabiente where codigo= $c3" )
             or die("Error en la consulta SQL");


	
	
	while($renglon=pg_fetch_array($rs))
	{
		$cod=$renglon["codigo"];
		$tipo=$renglon["tipoderechohabiente"];
		
	}
	

?>      


      <td colspan="3"><label>
        Tipo de Derechohabiente:
        <input name="der" type="text" id="der" value="<? echo $tipo ?>" readonly="readonly"  size="15" maxlength="15" />
      </label>        </td>
      <td colspan="2"><label>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sexo:
         <input name="sexo" type="text" value="<? echo $sexo ?>" id="sexo" readonly="readonly" size="10" maxlength="10" />
      </label></td>
      <td colspan="2"><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edad:
          <label>
          <input name="edad" type="text" value="<? echo $edad ?>" id="edad" readonly="readonly" size="3" maxlength="3" />
          </label>
</div></td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td></td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"></td>
      <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo de Servicio:
        <input name="servicio" type="text" value="REGULAR" id="servicio" readonly="readonly" size="15" maxlength="15" /></td>
      <td colspan="2"><label>
        Categoria:
        <input name="categoria" type="text" id="categoria" value="<? echo $categoria ?>"readonly="readonly" size="10" maxlength="10" />
      </label></td>
      <td colspan="2">Cita: <input name="cita" type="text" id="cita" value="<? echo $cita ?>"readonly="readonly" size="30" maxlength="30" /></td>
     
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label></label></td>
      <td><label></label></td>
      <td><label></label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#FF9900">
      <td colspan="3"><div align="center">PASAJERO
      </div>
      <div align="center"></div></td>
      <td colspan="3"><div align="center">SALIDA</div></td>
      <td colspan="3"><div align="center">REGRESO</div></td>
      <td rowspan="2"><div align="center">SUBTOTAL</div></td>
    </tr>
    <tr>
      <td bgcolor="#FF9900"><div align="center">Nombre(s)</div></td>
      <td bgcolor="#FF9900"><div align="center">Apellido Paterno </div></td>
      <td bgcolor="#FF9900"><div align="center">Apellido Materno </div></td>
      <td bgcolor="#FF9900"><div align="center">ORIGEN</div></td>
      <td bgcolor="#FF9900"><div align="center">DESTINO</div></td>
      <td bgcolor="#FF9900"><div align="center">COSTO</div></td>
      <td bgcolor="#FF9900"><div align="center">ORIGEN</div></td>
      <td bgcolor="#FF9900"><div align="center">DESTINO</div></td>
      <td bgcolor="#FF9900"><div align="center">COSTO</div></td>
    </tr>
    <tr bgcolor="#CCCCCC">
      <td><label>
        <div align="center">
          <input name="nombre" type="text" id="nombre" value="<? echo $nombre ?>" readonly="readonly" size="15" maxlength="15" />
        </div>
      </label></td>
      <td><label>
        <div align="center">
          <input name="appa" type="text" id="appa" value="<? echo $appa ?>" readonly="readonly" size="10" maxlength="10" />
        </div>
      </label></td>
      <td><div align="center">
        <label>
        <input name="apma" type="text" id="apma" value="<? echo $apma ?>" readonly="readonly" size="10" maxlength="10" />
        </label>
      </div></td>
      <td><div align="center">
        <label>
        <input name="celaya" type="text" id="celaya" value="<? echo $clinica ?>"  readonly="readonly" size="15" maxlength="6" />
        </label>

      </div></td>
      <td><div align="center">
        <label>
        <input name="destino" type="text" id="destino" value="<? echo $destino ?>" readonly="readonly" size="15" maxlength="15" />
        </label>
      </div></td>

    <?php
	
        


 $rs = pg_query ($conexion, "select * from costos where nomcategoria='$categoria' and nomciudad='$destino' and nomunidad='$_SESSION[umf]'" )
             or die("Error en la consulta SQL");


	
	
	while($renglon=pg_fetch_array($rs))
	{
		$idcost=$renglon["idcosto"];
		$nomcat=$renglon["nomcategoria"];
		$nomciu=$renglon["nomciudad"];
		$cost=$renglon["costo"];
		
	}


?>


      <td><div align="center">
        <label>
        <input name="costopas" type="text" id="costopas" value="<? echo $cost ?>" readonly="readonly" size="10" maxlength="10" />
        </label>
      </div></td>
      <td><label>
        
        <div align="center">
          <input name="origenregresopas" type="text" id="origenregresopas" value="<? echo $destino ?>" readonly="readonly" size="15" maxlength="15" />
        </div>
      </label></td>
      <td><div align="center">
        <label>
        <input name="celaya2" type="text" id="celaya2" value="<? echo $clinica ?>"  readonly="readonly" size="15" maxlength="15" />
        </label>
      </div></td>
      <td> <div align="center">
        <label>
        <input name="costoregresopas" type="text" id="costoregresopas" value="<? echo $cost ?>" readonly="readonly" size="10" maxlength="10" />
        </label>
      </div></td>
      <td><div align="center">
        <label>
        <input name="subtotalpas" type="text" id="subtotalpas" value="<?  $sub1=$cost+$cost; echo $sub1.'.00';  ?>"readonly="readonly" size="10" maxlength="10" />
        </label>
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr><tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="2"><div align="right">Categoria Acompa&ntilde;ante</div></td>
          <td>

<?
if ($categoria == "AUTOMOVIL") {

   $categoacomp="AUTOMOVIL";

}else{

   $categoacomp="COMPLETO";
   
}


?>
		<label>
        <input name="categoriaac" type="text" id="categoriaac" value="<? echo $categoacomp ?>"readonly="readonly" size="10" maxlength="10" />
      </label></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
    </tr>
        
        <tr>
          <td colspan="3" bgcolor="#FF9900"><div align="center">ACOMPA&Ntilde;ANTE</div></td>
          <td colspan="3" bgcolor="#FF9900"><div align="center">SALIDA</div></td>
          <td colspan="3" bgcolor="#FF9900"><div align="center">REGRESO</div></td>
          <td width="117" rowspan="2" bgcolor="#FF9900"><div align="center">SUBTOTAL</div></td>
        </tr>
        <tr>
          <td width="117" bgcolor="#FF9900"><div align="center">Nombre(s)</div></td>
          <td width="111" bgcolor="#FF9900"><div align="center">Apellido Paterno </div></td>
          <td width="116" bgcolor="#FF9900"><div align="center">Apellido Materno </div></td>
          <td width="127" bgcolor="#FF9900"><div align="center">ORIGEN</div></td>
          <td width="119" bgcolor="#FF9900"><div align="center">DESTINO</div></td>
          <td width="114" bgcolor="#FF9900"><div align="center">COSTO</div></td>
          <td width="116" bgcolor="#FF9900"><div align="center">ORIGEN</div></td>
          <td width="113" bgcolor="#FF9900"><div align="center">DESTINO</div></td>
          <td width="113" bgcolor="#FF9900"><div align="center">COSTO</div></td>
    </tr>
        <tr bgcolor="#CCCCCC">
          <td><div align="center">
              <label>
              <input name="nombreac" type="text" id="nombreac" value="<? echo $nomac ?>" readonly="readonly" size="15" maxlength="15" />
              </label>
          </div></td>
          <td><div align="center">
              <label>
              <input name="appaac" type="text" id="appaternoac" value="<? echo $appaac ?>" readonly="readonly" size="10" maxlength="10" />
              </label>
          </div></td>
          <td><div align="center">
              <label>
              <input name="apmaac" type="text" id="apmaternoac" value="<? echo $apmaac ?>" readonly="readonly" size="10" maxlength="10" />
              </label>
          </div></td>
          <td><div align="center">
            <label>
            <input name="celaya3" type="text" id="celaya3" value="<? echo $celaya?>" readonly="readonly" size="15" maxlength="15" />
            </label>
          </div></td>
          <td><div align="center">
              <label></label>
              <input name="destino2" type="text" id="destino2" value="<? echo $destino2 ?>"  readonly="readonly" size="15" maxlength="15" />
          </div></td>


          <?php
	
 


 $rs = pg_query ($conexion, "select * from costos where nomcategoria='$categoacomp' and nomciudad='$destino2' and nomunidad='$_SESSION[umf]'" )
             or die("Error en la consulta SQL");


	
	
	while($renglon=pg_fetch_array($rs))
	{
		$idcost2=$renglon["idcosto"];
		$nomcat2=$renglon["nomcategoria"];
		$nomciu2=$renglon["nomciudad"];
		$cost2=$renglon["costo"];
		
	}
	

?>




          <td><div align="center">
              <input name="costo2" type="text" id="costo2" value="<? echo $cost2 ?>" readonly="readonly" size="10" maxlength="10" />
          </div></td>
          <td><div align="center">
              <input name="origenregresoaco" type="text" id="origenregresoaco" value="<? echo $destino2 ?>" readonly="readonly" size="15" maxlength="15" />
          </div></td>
          <td><div align="center">
            <label>
            <input name="celaya4" type="text" id="celaya4" value="<? echo $celaya?>"  readonly="readonly"  size="15" maxlength="15" />
            </label>
          </div></td>
          <td><div align="center">
              <input name="costoregresoaco" type="text" id="costoregresoaco" value="<? echo $cost2 ?>" readonly="readonly" size="10" maxlength="10" />
          </div></td>
          <td><div align="center">
              <input name="subtotalaco" type="text" id="subtotalaco" value="<?  $sub2=$cost2+$cost2; echo $sub2.'.00';  ?>" readonly="readonly" size="10" maxlength="10" />
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div>Especialidad:</div>
            <label>
            <input name="especialidad" type="text" id="especialidad" value="<? echo $especialidad ?>" readonly="readonly"  size="20" maxlength="20" />
            </label></td>
          <td>&nbsp;</td>
          <td colspan="3"><div align="center">
            <label>Elaboro:
            <input name="elaboro" type="text" id="elaboro" value="<? echo $_SESSION['nomb'] ?>" size="30" readonly="readonly" maxlength="30" />
            </label>
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td bgcolor="#FF9900"><div align="center">TOTAL</div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <label>
            <input name="total" type="text" id="total" value="<? $total=$sub1+$sub2; echo $total.'.00';  ?>" readonly="readonly" size="10" maxlength="10" />
            </label>
          </div></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>


          <td colspan="2">&nbsp;</td>
          <td colspan="2"><div align="center">
            <label>
            <input name="boton" type="submit" id="boton" value="Regresar al Menu" />
            </label>
          </div>            <div align="center">
            <label></label>
            </div></td>
          <td colspan="2"><div align="center"></div>
          <div align="center"></div></td>
          <td colspan="2"><div align="center">
            <input name="boton" type="submit" id="boton" value="Imprimir" />
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
  </table>
  
</form>
 
   <?




if ($nomac !="") 

{




$sentencia8="insert into derechohabiente (cedula,tipoder,sexo,edad,nompasajero,appaterno,apmaterno) values ('$cedula','$tipo','$sexo',$edad,'$nombre','$appa','$apma')";





$sentencia3="insert into ordentraslado  (NoOrden,Fecha,Total,TipoServicio,Especialidad,NomEmpleado,estado,cita,horacaptura,vez,turno) values 
($orden,'$fecha',$total,'REGULAR','$especialidad','$usuario','APROBADO','$cita','$hora','$vez','$turno')";



$sentencia4="insert into ordenpasajero  (NoOrden,idcosto,Cedula,SubPasajero) values ($orden,$idcost,'$cedula',$sub1)";



 $sentencia5="insert into ordenacompañante (NoOrden,idcosto,nomac,appaternoac,apmaternoac,subac) values 
($orden,$idcost2,'$nomac','$appaac','$apmaac',$sub2)";

$sentencia6= "update derechohabiente set edad=$edad where cedula='$cedula'";

}
else{

  
$sentencia8="insert into derechohabiente (cedula,tipoder,sexo,edad,nompasajero,appaterno,apmaterno) values ('$cedula','$tipo','$sexo',$edad,'$nombre','$appa','$apma')";


   $sentencia3 ="insert into ordentraslado  (NoOrden,Fecha,Total,TipoServicio,Especialidad,NomEmpleado,estado,cita,horacaptura,vez,turno) values 
($orden,'$fecha',$total,'REGULAR','$especialidad','$usuario','APROBADO','$cita','$hora','$vez','$turno')";

$sentencia4="insert into ordenpasajero  (NoOrden,idcosto,Cedula,SubPasajero) values ($orden,$idcost,'$cedula',$sub1)";


 $sentencia5 ="insert into ordenacompañante (NoOrden,idcosto,NomAc,ApPaternoAc,ApMaternoAc,SubAc) values 
($orden,14,'','','',0)";


$sentencia6= "update derechohabiente set edad=$edad where cedula='$cedula'";
   
}


pg_query($sentencia8);                      

pg_query($sentencia3);

pg_query($sentencia4);

pg_query($sentencia5);

pg_query($sentencia6);

pg_query($sentencia9);


}
}

?>


<div id="pie">
<p><img src="pie.jpg" width="1200" height="140" /></p> 
</div>
</div>
</body>
</html>
