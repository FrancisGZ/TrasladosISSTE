


<?
$usr = $_POST["usr"];
$cont = $_POST["cont"];

        
if($usr=="")
           {
               $mensaje2="Introducir Usuario";
              echo "<script>";
                        echo "alert('$mensaje2');";  
                        echo "window.location = 'Login.php';";
                        echo "</script>";  
            }



if($cont=="")
           {
               $mensaje2="Introducir Contrasena";
              echo "<script>";
                        echo "alert('$mensaje2');";  
                        echo "window.location = 'Login.php';";
                        echo "</script>";  
            }





  $conexion = pg_connect("host=localhost dbname=iste user=postgres password=administrador") or
      die ("Fallo en el establecimiento de la conexión");


 $rs = pg_query ($conexion, "select * from usuarios where usuario= '$usr' and contrasena='$cont'" )
             or die("Error en la consulta SQL");


        

	if ($ren = pg_fetch_array($rs))
		{
			  session_start();
				$_SESSION['usuario'] = $usr; 
				$_SESSION['nomb'] = $ren["nombre"];
                                $_SESSION['umf'] = $ren["nomunidad"];
                               $_SESSION['dep'] = $ren["departamento"];
                                $nivel =$ren["nivelacceso"];
 
                               if ($nivel ==1)
                                {
                                     header ("location:Menu.php");
                                     $_SESSION['seguridad'] = 1;
                                 }     
                              if ($nivel ==2)
                                 {
                                   header ("location:Menu.php");
                                     $_SESSION['seguridad'] = 2;
                                  }
				  if ($nivel ==3)
                                 {
                                   header ("location:Menu.php");
                                     $_SESSION['seguridad'] = 3;
                                  }
		}

	 
          else 
		{
		
			
                        $mensaje = "Usuario Incorrecto, vuelva a intentar";
                        echo "<script>";
                        echo "alert('$mensaje');";  
                        echo "window.location = 'Login.php';";
                        echo "</script>";  

			}
			


			
	
	
	

?>   

