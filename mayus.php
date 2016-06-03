
    <html>  
    <head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Text Object DefaultValue</title>  
    <script language=""="JavaScript">  
        function conMayusculas(field) {  
field.value = field.value.toUpperCase(); 
    }  
    </script>  
    </head>  
    <body>  
    <form>  
    Al salir del campo convierte en mayúsculas:<br />  
    <label>Nombre:</label><input input="text" name="nombre" value="" onChange="conMayusculas(this)"><br />  
    <label>Apellidos:</label><input type="text" name="apellidos" value=""  onChange="conMayusculas(this)"><br />  
    </form>  
    </body>  
    </html>    
