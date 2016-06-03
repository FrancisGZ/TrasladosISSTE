


<?

$boton=$_POST["boton"];
$idesp = $_POST["idespecialidad"];
$esp = $_POST["especialidad"];
        



  $conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or
      die ("Fallo en el establecimiento de la conexión");

  

	
                     if ($boton =="Agregar")
                                {
                                     $sentencia="insert into especialidad (especialidad) values      
                                     ('$esp')";


                                 	pg_query($sentencia); 
                                        header ("location:especialidad.php");
                                 }     
                              if ($boton =="Modificar")
                                 {
                                  
                                  $sentencia="update especialidad 
                                  set especialidad='$esp'
                                  where idespecialidad=$idesp";

	                            pg_query($sentencia); 
                                    header ("location:especialidad.php");
                                  }
				  if ($boton =="Borrar")
                                 {
                                  $sentencia="delete from costos where idespecialidad=$idesp";
	
                                  pg_query($sentencia); 
                                   header ("location:especialidad.php");

                                  }
		                if ($boton =="Limpiar")
                                 {
                                   header ("location:especialidad.php");
                                     
                                  }
                                if ($boton =="Regresar")
                                 {
                                   header ("location:A1Menu.php");
                                  
                                  }
	 
                                if ($boton =="Salir")
                                 {
                                   session_destroy();
                                 header ("location:Login.php");
                                  }
	
	


?>   

