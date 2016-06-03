<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?session_start();?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transporte</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">

<SCRIPT LANGUAGE="JavaScript">


agree = 0;

 function putFocus(formInst, elementInst) {
  if (document.forms.length > 0) {
   document.forms[formInst].elements[elementInst].focus();
  }
 }



function autotab(thisval,fname, flen){
 
 var fieldname = eval("document.TheForm." + fname);

 if(thisval != 9 && thisval != 16){

 if(fieldname.value.length + 1 <= flen){
  fieldname.focus();
 }else{
 
  for(x=0; x<document.TheForm.elements.length; x++){
        if(fieldname.name == document.TheForm.elements[x].name){
                var nextfield = x + 1;
        }
  }

          document.TheForm.elements[nextfield].focus();

 }
 }
}



function conMayusculas(field) {  
field.value = field.value.toUpperCase(); 
    }  




function validar_numero(e)
{ //
tecla = (document.all) ? e.keyCode : e.which; //
if ((tecla==8) || (tecla==0)) return true; //
patron =/\d/ //
te = String.fromCharCode(tecla); //
return patron.test(te); //
} //Para nmero



</script>

</head>

<body onLoad="putFocus(0,1);">
<div id="contenedor" align="center">
<form id="TheForm" name="TheForm" method="post" action="transportepdf.php">
  <p align="center"><img src="bts.png" width="1200" height="80" /></p>
  
  
  
  <?php 


$cedula = $_GET ["cedula"];
$ce = $_GET ["c1"];
$cd = $_GET ["c2"];
$cu = $_GET ["c3"];



$conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or

     die ("Fallo en el establecimiento de la conexi&oacute;n");



$rs = pg_query ($conexion, "select * from derechohabiente where cedula='$cedula'" )
             or die("Error en la consulta SQL");


	
	
	while($renglon=pg_fetch_array($rs))
	{
		$cedula=$renglon["cedula"];
		$nom=$renglon["nompasajero"];
                $apaterno=$renglon["appaterno"];
                $amaterno=$renglon["apmaterno"];
                $domicilio=$renglon["domicilio"];
		$colonia=$renglon["colonia"];
                $localizacion=$renglon["lugar"];
                $calles=$renglon["calles"];
		$telefono=$renglon["telefono"];
		
	}
	

?>

  <p align="center">Fecha:
    <input type="text" name="fecha"  id="fecha" readonly="readonly" size ="10" value="<?php echo $fecha = (date('j-n-Y')) ?>"/>
</p>
  <p align="center">Cedula
    <input name="c1" type="text" id="c1" size="4" maxlength="4" value="<?php echo $ce?>" onchange="conMayusculas(this)" onkeyup="autotab(event.keyCode,this.name,4)"/>
    <input name="c2" type="text" id="c2" size="6" maxlength="6" value="<?php echo $cd?>" onkeypress="return validar_numero(event)" onkeyup="autotab(event.keyCode,this.name,6)"/>
    <?



 if ($cu != "") {

?>
    <input name="c3" type="text" id="c3" size="1" maxlength="1" value="<?php echo $cu?>" onkeypress="return validar_numero(event)"/>
    <?php
   
}else{
  
 ?>
    <select name="c3">
      <?php
   $result = pg_query ($conexion, "select * from tipoderechohabiente" )

             or die("Error en la consulta SQL");



while($vb=pg_fetch_array($result)){

?>
      <option value="<? echo $vb[codigo];?>"> <? echo $vb[codigo];?>
      <?}?>
      </option>
    </select>
    <?php }?>

    <label></label>  
    <label>
    <input name="boton" type="submit" id="boton" value="Buscar" />
    </label>
  <table width="659" border="0">
    <tr>
      <td width="222">&nbsp;</td>
      <td width="120">&nbsp;</td>
      <td width="100">Apellido Paterno </td>
      <td width="177">Apellido Materno </td>
    </tr>
    <tr>
      <td>Nombre:</td>
      <td><input name="nombre" type="text" id="nombre" size="20" maxlength="20" value="<?php echo $nom?>" onchange="conMayusculas(this)" /></td>
      <td><input name="paterno" type="text" id="paterno" size="10" maxlength="10" value="<?php echo $apaterno?>" onchange="conMayusculas(this)" /></td>
      <td><input name="materno" type="text" id="materno" size="10" maxlength="10" value="<?php echo $amaterno?>" onchange="conMayusculas(this)"/></td>
    </tr>
    <tr>
      <td>Domicilio:</td>
      <td colspan="3"><input name="domicilio" type="text" id="domicilio" size="60" maxlength="60" value="<?php echo $domicilio?>" onchange="conMayusculas(this)" /></td>
      </tr>
    <tr>
      <td>Colonia:</td>
      <td colspan="3"><input name="colonia" type="text" id="colonia" size="30" maxlength="30"value="<?php echo $colonia?>" onchange="conMayusculas(this)"/>
        Telefono:  <input name="telefono" type="text" id="telefono" size="10" maxlength="10" value="<?php echo $telefono?>" /></td>
      </tr>
    <tr>
      <td>Lugar de localizacion: </td>
      <td colspan="3"><input name="localizacion" type="text" id="localizacion" size="60" maxlength="60" value="<?php echo $localizacion?>" onchange="conMayusculas(this)"/></td>
      </tr>
    <tr>
      <td>Entre que calles esta: </td>
      <td colspan="3"><input name="calles" type="text" id="calles" size="60" maxlength="60" value="<?php echo $calles?>" onchange="conMayusculas(this)"/></td>
      </tr>
    <tr>
      <td>Destino:</td>
      <td colspan="3"><select name="destino">
<option></option>

<?




   $result = pg_query ($conexion, "select distinct nomciudad from costos2 where nomunidad='$_SESSION[umf]' order by nomciudad" )




             or die("Error en la consulta SQL");



while($vb=pg_fetch_array($result)){

?>

<option value="<? echo $vb[nomciudad];?>"> <? echo $vb[nomciudad];?>

<?}?></option>
      </select></td>
      </tr>
    <tr>
      <td>Ambulancia Num Eco: </td>
      <td colspan="3"><input name="ambulancia" type="text" id="ambulancia" size="5" maxlength="5" /></td>
      </tr>
    <tr>
      <td>Chofer:</td>
      <td colspan="3"><input name="chofer" type="text" id="chofer" size="30" maxlength="30" onchange="conMayusculas(this)" /></td>
      </tr>
    <tr>
      <td>Requiere camillero: </td>
      <td colspan="3"><label>
        <input name="camilla" type="radio" value="agree" onClick="agree=1; document.enableform.box.focus();" />
      Si</label>
        <label>
        <input name="camilla" type="radio" value="disagree" onClick="agree=0; document.enableform.box.value='';" />
      No</label></td>
      </tr>
    <tr>
      <td>Camillero</td>
      <td colspan="3"><input name="camillero" type="text" id="camillero" size="30" maxlength="30" onFocus="if (!agree)this.blur();" onChange="if (!agree)this.value='';conMayusculas(this)"  /></td>
      </tr>
    <tr>
      <td>Requiere oxigeno: </td>
      <td colspan="3">
        <input name="oxigeno" type="radio" value="Si" />
      Si
      <input name="oxigeno" type="radio" value="No" />
      No</td>
      </tr>
    <tr>
      <td>Diagnostico:</td>
      <td colspan="3"><input name="diagnostico" type="text" id="diagnostico" size="60" maxlength="60" onchange="conMayusculas(this)"/></td>
      </tr>
    <tr>
      <td>Motivo del traslado: </td>
      <td colspan="3"><input name="motivo" type="text" id="motivo" size="60" maxlength="60" onchange="conMayusculas(this)"/></td>
      </tr>
    <tr>
      <td>Medico solicitante: </td>
      <td colspan="3"><input name="medico" type="text" id="medico" size="30" maxlength="30" onchange="conMayusculas(this)"/></td>
      </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><div align="center">
        <label>
        <input name="boton" type="submit" id="boton" value="Generar Orden" />
        </label>
        <label>
        <input name="boton" type="submit" id="boton" value="Limpiar" />
        </label>
        <label>
        <input name="boton" type="submit" id="boton" value="Regresar al Menu" />
        </label>
      </div></td>
      </tr>
  </table>
  <p align="center">
  </form>
<div>
<img src="pie.jpg" width="1200" height="140" />
</div>

</div>
</body>
</html>
