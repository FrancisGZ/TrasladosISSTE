


<?
$idusr = $_POST["idusuario"];
$nomb = $_POST["nombre"];
$usr = $_POST["usuario"];
$cont = $_POST["contrasena"];
$niv = $_POST["nivel"];
$cli = $_POST["clinica"];
$dep = $_POST["departamento"];
$boton=$_POST["boton"];

        


  $conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or
      die ("Fallo en el establecimiento de la conexión");

  

	
 
                               if ($boton =="Agregar")
                                {
                                     $sentencia="insert into usuarios (nombre,usuario,contrasena,nivelacceso,nomunidad,departamento) values      
                                     ('$nomb','$usr','$cont',$niv,'$cli','$dep')";


                                 	pg_query($sentencia); 
                                        header ("location:usuariostransporte.php");
                                 }     
                              if ($boton =="Modificar")
                                 {
                                  
                                  $sentencia="update usuarios 
                                  set nombre='$nomb',usuario='$usr',contrasena='$cont',nivelacceso=$niv,nomunidad='$cli',departamento='$dep'   
                                  where idusuario=$idusr";

	                            pg_query($sentencia); 
                                    header ("location:usuariostransporte.php");
                                  }
				  if ($boton =="Borrar")
                                 {
                                  $sentencia="delete from usuarios where idusuario=$idusr";
	
                                  pg_query($sentencia); 
                                   header ("location:usuariostransporte.php");

                                  }
		                if ($boton =="Limpiar")
                                 {
                                   header ("location:usuariostransporte.php");
                                     
                                  }
                                if ($boton =="Regresar")
                                 {
                                   header ("location:menutransportesadmon.php");
                                  
                                  }
	 
                                if ($boton =="Salir")
                                 {
                                   session_destroy();
                                 header ("location:login.php");
                                  }
	
	


?>   

