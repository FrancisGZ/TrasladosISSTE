


<?

$boton=$_POST["boton"];
$idcost = $_POST["idcosto"];
$cli = $_POST["clinica"];
$categoria = $_POST["categoria"];
$ciu = $_POST["ciudad"];
$cost = $_POST["costo"];
        



  $conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or
      die ("Fallo en el establecimiento de la conexión");

  

	
                     if ($boton =="Agregar")
                                {
                                     $sentencia="insert into costos (nomunidad,nomcategoria,nomciudad,costo) values      
                                     ('$cli','$categoria','$ciu',$cost)";


                                 	pg_query($sentencia); 
                                        header ("location:costos.php");
                                 }     
                              if ($boton =="Modificar")
                                 {
                                  
                                  $sentencia="update costos 
                                  set nomunidad='$cli',nomcategoria='$categoria',nomciudad='$ciu',costo=$cost
                                  where idcosto=$idcost";

	                            pg_query($sentencia); 
                                    header ("location:costos.php");
                                  }
				  if ($boton =="Borrar")
                                 {
                                  $sentencia="delete from costos where idcosto=$idcost";
	
                                  pg_query($sentencia); 
                                   header ("location:costos.php");

                                  }
		                if ($boton =="Limpiar")
                                 {
                                   header ("location:costos.php");
                                     
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

