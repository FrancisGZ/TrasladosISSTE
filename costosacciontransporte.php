


<?

$boton=$_POST["boton"];
$idcost = $_POST["idcosto"];
$cli = $_POST["clinica"];
$ciu = $_POST["ciudad"];
$cost = $_POST["costo"];
        



  $conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or
      die ("Fallo en el establecimiento de la conexión");

  

	
                     if ($boton =="Agregar")
                                {
                                     $sentencia="insert into costos2 (nomunidad,nomciudad,costo) values      
                                     ('$cli','$ciu',$cost)";


                                 	pg_query($sentencia); 
                                        header ("location:costostransporte.php");
                                 }     
                              if ($boton =="Modificar")
                                 {
                                  
                                  $sentencia="update costos2 
                                  set nomunidad='$cli',nomciudad='$ciu',costo=$cost
                                  where idcosto=$idcost";

	                            pg_query($sentencia); 
                                    header ("location:costostransporte.php");
                                  }
				  if ($boton =="Borrar")
                                 {
                                  $sentencia="delete from costos2 where idcosto=$idcost";
	
                                  pg_query($sentencia); 
                                   header ("location:costostransporte.php");

                                  }
		                if ($boton =="Limpiar")
                                 {
                                   header ("location:costostransporte.php");
                                     
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

