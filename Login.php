<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">


<SCRIPT LANGUAGE="JavaScript">


 function putFocus(formInst, elementInst) {
  if (document.forms.length > 0) {
   document.forms[formInst].elements[elementInst].focus();
  }
 }

</script>

</head>

<body onLoad="putFocus(0,0);">

<div id="contenedor" align="center">
<form id="form1"  name="form1" method="post" action="LoginValidar.php">

    <img src="bannertexto.png" width="1200" height="80" />
<br>
<br>
<img src="NuevoIssste.jpg" width="160" height="150" align="center"/>
  <br>
<br>
    <table width="315" border="0">
      <tr>
        <td width="135"><div align="left">Usuario:</div></td>
        <td width="170"><div class="separar" align="center">
          <div align="center">
            <input name="usr" type="text" id="usr" size="18" maxlength="20" />
            </div>
        </div>        </td>
      </tr>
      <tr>
        <td><div align="left">Contrase&ntilde;a:</div></td>
        <td><div class="separar" align="center"> 
          <div align="center">
            <input name="cont" type="password" id="cont" size="18" maxlength="20" />
           </div>
        </div>       </td>
      </tr>

    </table>  
<br>
    <p>
      
      <input name="boton" type="submit" id="boton" value="Entrar" />
     
    </p>

</form>

<div>
<img src="pie.jpg" width="1200" height="140" />
</div>

</div>
</body>
</html>
