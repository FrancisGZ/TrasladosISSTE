<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<?
session_start();


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



<html xmlns="http://www.w3.org/1999/xhtml">

<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Capturar Orden</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">
</head>

<script type="text/javascript">

agree = 0;

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



function putFocus(formInst, elementInst) {
  if (document.forms.length > 0) {
   document.forms[formInst].elements[elementInst].focus();
  }
 }




function cambiarDisplay(id) {

  if (!document.getElementById) return false;

  fila = document.getElementById(id);

  if (fila.style.display != "none") {

    fila.style.display = "none"; //ocultar fila 

  } else {

    fila.style.display = ""; //mostrar fila 

  }

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



<body onLoad="putFocus(0,0);">

<?php
$cedula = $_GET ["cedula"];
$ce = $_GET ["c1"];
$cd = $_GET ["c2"];
$cu = $_GET ["c3"];
$orden = $_GET["orden"];

?>

<div id="contenedor">

<form id="TheForm" name="TheForm" method="post" action="S1orden.php">

 <p align="center"><img src="btr.png" width="1200" height="80" /></p>

<?php 
$conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or

     die ("Fallo en el establecimiento de la conexi&oacute;n");



$rs = pg_query ($conexion, "select * from derechohabiente where cedula='$cedula'" )
             or die("Error en la consulta SQL");


	
	
	while($renglon=pg_fetch_array($rs))
	{
		$cedula=$renglon["cedula"];
		$sexo=$renglon["sexo"];
		$edad=$renglon["edad"];
		$nom=$renglon["nompasajero"];
                $apaterno=$renglon["appaterno"];
                $amaterno=$renglon["apmaterno"];
		
	}
	


if($orden!=""){
$rs2 = pg_query ($conexion, "select noorden from ordentraslado where noorden=$orden" )
             or die("Error en la consulta SQL");


	
	
	while($renglon2=pg_fetch_array($rs2))
	{
		$orden2=$renglon2["noorden"];
		
		
	}
}

?>



 <table width="929" align="center" border="0">

   <tr>

     <td width="183"></td>

     <td width="144"></td>

     <td width="171"></td>

     <td width="200"></td>

     <td width="200"></td>

     <td width="5"></td>
    </tr>

   <tr>

     <td colspan="3">

      <div align="left">
      Cedula
       <input name="c1" type="text" id="c1" size="4" maxlength="4" value="<?php echo $ce?>" onChange="conMayusculas(this)" onkeyup="autotab(event.keyCode,this.name,4)"/>
      
        <input name="c2" type="text" id="c2" size="6" maxlength="6" value="<?php echo $cd?>" onkeypress="return validar_numero(event)" onkeyup="autotab(event.keyCode,this.name,6)"/>
     
        <?



 if ($cd != "") {

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
        <input name="boton" type="submit" id="boton" value="Buscar" />
      </div>     </td>

     <td colspan="2">
       <div align="right"> No. Orden
       <input name="orden" type="text" id="orden" size="8" maxlength="8"  value="<?php echo $orden?>" onkeypress="return validar_numero(event)" />  
       <label>
       <input name="boton" type="submit" id="boton" value="Buscar" />
       </label>
       </div>    </td>

     <td>&nbsp;</td>
    </tr>

   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td><?php if($orden!="")

{
 if ($orden2!="")

{
echo"La orden ya existe";
}

else
{ 
echo "La orden no existe";
}
}?></td>
     <td>&nbsp;</td>
   </tr>
   <tr>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>
    </tr>

   <tr>

     <td><div align="center">Nombre(s) </div></td>

     <td><div align="center">Apellido Paterno </div></td>

     <td><div align="center">Apellido Materno </div></td>

     <td><div align="center">Edad</div></td>

     <td><div align="center">Sexo</div></td>

     <td rowspan="2"><label>

      </label></td>
    </tr>

   <tr>

     <td><div align="center">

       <label>

       <input name="nombre" type="text" id="nombre" size="15" maxlength="15" value="<?php echo $nom?>" onChange="conMayusculas(this)"/>
       </label>

     </div></td>

     <td><div align="center">

       <label>

       <input name="appa" type="text" id="appa" size="15" maxlength="15" value="<?php echo $apaterno?>" onChange="conMayusculas(this)"/>
       </label>

     </div></td>

     <td><div align="center">

       <label>

       <input name="apma" type="text" id="apma" size="15" maxlength="15" value="<?php echo $amaterno?>" onChange="conMayusculas(this)"/>
       </label>

     </div></td>

     <td><div align="center">

       <label>

       <input name="edad" type="text" id="edad" size="3" maxlength="3" value="<?php echo $edad?>" onkeypress="return validar_numero(event)" />
       </label>

     </div></td>

     <td><div align="right">
<?php
if ($sexo != "") {

?>

  <input name="sexo" type="text" id="sexo" size="9" maxlength="1" value="<?php echo $sexo?>"/>   


<?php
   
}else{
  

?>
 <SELECT name="sexo">

     <OPTION>
     <OPTION>MASCULINO
     <OPTION>FEMENINO
     </SELECT>

<?php }?>


     

     </div></td>
     </tr>

   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>
    </tr>

   <tr>

     <td><div align="center">

       <label>Destino

       <select name="destino">
<option></option>

<?




   $result = pg_query ($conexion, "select distinct nomciudad from costos where nomunidad='$_SESSION[umf]' and nomciudad IN ('MEXICO','LEON','GUADALAJARA')" )




             or die("Error en la consulta SQL");



while($vb=pg_fetch_array($result)){

?>

<option value="<? echo $vb[nomciudad];?>"> <? echo $vb[nomciudad];?>

<?}?></option>
</select>
       </label>

     </div></td>

     <td colspan="2"><div align="center">

       <label>Categoria

       <select name="categoria">

     <OPTION>
     <OPTION>COMPLETO
     <OPTION>MEDIO
     <OPTION>AUTOMOVIL
     <OPTION>DOBLE ACOM
        </select>
       </label>

     </div></td>


     <td colspan="3"><div align="left">
<div align="left">

       <label>
       <div align="center">Especialidad
         
         <select name="especialidad">
           <option></option>
           
           <?




   $result = pg_query ($conexion, "select * from especialidad" )




             or die("Error en la consulta SQL");




while($vb=pg_fetch_array($result)){

?>
           
           <option value="<? echo $vb[especialidad];?>"> <? echo $vb[especialidad];?>
             
             <?}?>
             </option>
           </select>
       </div>
       </label>
       
</div>      </td>
     </tr>

   <tr>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td colspan="2">Nueva Especialidad:<label><input name="nueva" type="radio" value="agree" onClick="agree=1; document.enableform.box.focus();" />
      Si</label>

 <label>
        <input name="nueva" type="radio" value="disagree" onClick="agree=0; document.enableform.box.value='';" />
      No</label>

<input name="especialidad2" type="text" id="especialidad" size="20" maxlength="20" onFocus="if (!agree)this.blur();" onChange="if (!agree)this.value='';conMayusculas(this)"/></td>

     <td>&nbsp;</td>
   </tr>




   <tr>
     <td>&nbsp;</td>
     <td colspan="2">&nbsp;</td>
     <td colspan="2" >&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>

     <td><div align="center">
       <label>Tipo
       <select name="vez">
	 <OPTION>
     <OPTION>1RA VEZ
     <OPTION>SUBSECUENTE
       </select>
       </label>
     </div></td>

     <td colspan="2"><div align="center">
       <label>Turno
       <select name="turno">
     <OPTION>
     <OPTION>MATUTINO
     <OPTION>VESPERTINO
       </select>
       </label>
     </div></td>
<td colspan="2" > <div align="left">
        <div align="center">Cita
          
          <input name="cita" type="text" id="cita" size="30" maxlength="30" onChange="conMayusculas(this)"/>
          </div></td>
	
     
     <td>&nbsp;</td>
   </tr>

 <tr>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>
   </tr>

<tr>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>
   </tr>
<tr>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>
   </tr>


   <tr id="row1" onClick="cambiarDisplay('row2')">

     <td>&nbsp;</td>

     <td bgcolor="#FF9900"><div align="center"><strong>Con Acompa&ntilde;ante </strong></div></td>

     <td>&nbsp;</td>

     <td bgcolor="#FF9900"><div align="center"><strong>Sin Acompa&ntilde;ante </strong></div></td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>
   </tr>

   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>
   </tr>

   <tr id="row2"  style="display:none" >

     <td colspan="6"><table width="710" align="center">

       <tr>

         <td width="241"><div align="center">Nombre(s)</div></td>


         <td width="238"><div align="center">Apellido Paterno </div></td>




         <td width="236"><div align="center">Apellido Materno </div></td>
         </tr>

       <tr>

         <td><div align="center">

           <label>

           <input name="nomac" type="text" id="nomac" size="15" maxlength="15" onChange="conMayusculas(this)" />
           </label>

         </div></td>

         <td><div align="center">

           <label>

           <input name="appaac" type="text" id="appaac" size="15" maxlength="15" onChange="conMayusculas(this)"/>
           </label>

         </div></td>

         <td><div align="center">

           <label>

           <input name="apmaac" type="text" id="apmaac" size="15" maxlength="15" onChange="conMayusculas(this)"/>
           </label>

         </div></td>
         </tr>

       <tr>

         <td>&nbsp;</td>

         <td>&nbsp;</td>

         <td>&nbsp;</td>
         </tr>

       <tr>

         <td></td>

         <td></td>

         <td>&nbsp;</td>
         </tr>

     </table></td>
    </tr>

   <tr>

     <td>&nbsp;</td>

     <td><div align="center">
       <label>
       <div align="right">
         <input name="boton" type="submit" id="boton" value="Regresar al Menu" />
       </div>
       </label>
     </div></td>

     <td><div align="center">

       

     </div></td>

     <td>       <label>
        <div align="left">
          <input name="boton" type="submit" id="boton" value="Generar Orden" />
        </div>
       </label></td><td>&nbsp;</td>

     <td>&nbsp;</td>
   </tr>

   <tr>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>
   </tr>
<tr>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>

     <td>&nbsp;</td>
   </tr>
 </table>






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
