<?php
	$servidor="localhost";
    $baseDeDatos="formulario";
	$usuario="root";
	$clave="";
	

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}


    $user=$_POST["user"];
    $contrasena=$_POST["contrasena"];
    
    $consulta="SELECT * FROM login WHERE user='$user'";
    
    $resultado=mysqli_query($enlace, $consulta);
    
    $filas=mysqli_num_rows($resultado);
    
    if($filas>0){
    
        header("location:menuempleados.php");
    }
    else{
        
        
        echo  "<script>
                alert('Usuario y/o Contraseña incorrectos');
     
        </script>";

    }
    
    mysqli_free_result($resultado);
    
    
    


?>





