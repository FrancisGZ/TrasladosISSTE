<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Untitled Document</title>
<style type="text/css">

</style></head>


<body onLoad="window.print();">


<form id="form1" name="form1" method="post" >
  <table align="center" width="1101" border="0">
	
	<?


$cedula = $_POST["cedula"];

$categoria = $_POST["categoria"];

$servicio = $_POST["servicio"];

$nombre = $_POST["nombre"];

$appa = $_POST["appa"];

$apma = $_POST["apma"];

$destino = $_POST["destino"];

$destino2 = $_POST["destino2"];

$especialidad = $_POST["especialidad"];

$nombreac = $_POST["nombreac"];

$appaac = $_POST["appaac"];

$apmaac = $_POST["apmaac"];

$categoria2 = $_POST["categoria2"];

$costopas = $_POST["costopas"];

$costo2 = $_POST["costo2"];

$subtotalpas = $_POST["subtotalpas"];

$subtotalaco = $_POST["subtotalaco"];

$total = $_POST["total"];

$celaya= "celaya";


?>
	
    <tr>
      <td width="319">&nbsp;</td>
      <td width="112">&nbsp;</td>
      <td width="129">&nbsp;</td>
      <td width="124">&nbsp;</td>
      <td width="99">&nbsp;</td>
      <td colspan="3" align="right"><? echo (date('j'));?>&nbsp;&nbsp;&nbsp;<? echo (date('n'));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo (date('Y'));?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="112">&nbsp;</td>
      <td width="86">&nbsp;</td>
      <td width="86">&nbsp;</td>
    </tr>
    <tr>
      <td height="20">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="20">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="36">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30"><? echo $nombre;?> &nbsp;  <? echo $appa;?> &nbsp;  <? echo $apma;?></td>
      <td>&nbsp;</td>
      <td><? echo $celaya;?></td>
      <td><? echo $destino;?></td>
      <td><? echo $costopas;?></td>
      <td><? echo $destino;?></td>
      <td><? echo $celaya;?></td>
      <td align="right"><? echo $costopas;?></td>
    </tr>
    <tr>
      <td height="24">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right" ><p><? echo $subtotalpas;?></p>   </td>
    </tr>
    <tr>
      <td height="26"><? echo $nombreac;?> &nbsp;  <? echo $appaac;?> &nbsp;  <? echo $apmaac;?></td>
      <td>&nbsp;</td>
      <td><? echo $celaya;?></td>
      <td><? echo $destino2;?></td>
      <td><? echo $costo2;?></td>
      <td><? echo $destino2;?></td>
      <td><? echo $celaya?></td>
      <td align="right"><? echo $costo2;?></td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><? echo $subtotalaco;?></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><? echo $total;?></td>
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
    </tr>
  </table>

</form>
</body>
</html>
