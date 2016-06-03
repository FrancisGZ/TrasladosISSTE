<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Transporte</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">

<SCRIPT LANGUAGE="JavaScript">


agree = 0;

 function putFocus(formInst, elementInst) {
  if (document.forms.length > 0) {
   document.forms[formInst].elements[elementInst].focus();
  }
 }

</script>

</head>

<body onLoad="putFocus(0,3);">
<div id="contenedor" align="center">
<form>
  <p align="center"><img src="bannertexto.png" width="1200" height="80" /></p>
  <table width="659" border="0">
    <tr>
      <td colspan="2">Cedula:
        <label>
        <input name="cedula" type="text" id="cedula" size="15" maxlength="15" />
        </label></td>
      <td>&nbsp;</td>
      <td>Fecha:
        <input type="text" name="fecha"  id="fecha" readonly="readonly" size ="10" value="<?php echo $fecha = (date('j-n-Y')) ?>"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="222">&nbsp;</td>
      <td width="120">&nbsp;</td>
      <td width="100">Apellido Paterno </td>
      <td width="177">Apellido Materno </td>
    </tr>
    <tr>
      <td>Nombre:</td>
      <td><input name="nombre" type="text" id="nombre" size="20" maxlength="20" /></td>
      <td><input name="appaterno" type="text" id="appaterno" size="10" maxlength="10" /></td>
      <td><input name="apmaterno" type="text" id="apmaterno" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td>Domicilio:</td>
      <td colspan="3"><input name="domicilio" type="text" id="domicilio" size="40" maxlength="40" /></td>
      </tr>
    <tr>
      <td>Colonia:</td>
      <td colspan="3"><input name="colonia" type="text" id="colonia" size="20" maxlength="20" />
        Telefono:  <input name="telefono2" type="text" id="telefono2" size="10" maxlength="10" /></td>
      </tr>
    <tr>
      <td>Lugar de localizacion: </td>
      <td colspan="3"><input name="localizacion" type="text" id="localizacion" size="60" maxlength="60" /></td>
      </tr>
    <tr>
      <td>Entre que calles esta: </td>
      <td colspan="3"><input name="calles" type="text" id="calles" size="60" maxlength="60" /></td>
      </tr>
    <tr>
      <td>Destino:</td>
      <td colspan="3"><select name="select">
      </select></td>
      </tr>
    <tr>
      <td>Ambulancia Num Eco: </td>
      <td colspan="3"><input name="ambulancia" type="text" id="ambulancia" size="5" maxlength="5" /></td>
      </tr>
    <tr>
      <td>Chofer:</td>
      <td colspan="3"><input name="chofer" type="text" id="chofer" size="30" maxlength="30" /></td>
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
      <td colspan="3"><input name="camillero" type="text" id="camillero" size="30" maxlength="30" onFocus="if (!agree)this.blur();" onChange="if (!agree)this.value='';"  /></td>
      </tr>
    <tr>
      <td>Requiere oxigeno: </td>
      <td colspan="3"><label>
        <input name="radiobutton" type="radio" value="radiobutton" />
      Si
      <input name="radiobutton" type="radio" value="radiobutton" />
      No</label></td>
      </tr>
    <tr>
      <td>Diagnostico:</td>
      <td colspan="3"><input name="diagnostico" type="text" id="diagnostico" size="60" maxlength="60" /></td>
      </tr>
    <tr>
      <td>Motivo del traslado: </td>
      <td colspan="3"><input name="motivo" type="text" id="motivo" size="60" maxlength="60" /></td>
      </tr>
    <tr>
      <td>Medico solicitante: </td>
      <td colspan="3"><input name="medico" type="text" id="medico" size="30" maxlength="30" /></td>
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
        <input name="boton" type="submit" id="boton" value="Regresar" />
        </label>
        <label>
        <input name="boton" type="submit" id="boton" value="Salir" />
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
