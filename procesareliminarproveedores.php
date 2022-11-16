<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="formulario";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}


    $id =$_GET["id"];

    $eliminar="DELETE FROM registroproveedores WHERE id_proveedor='$id'";

    $resultadoeliminar = mysqli_query($enlace, $eliminar);
    

    if(!$resultadoeliminar){
        echo"No se pudo eliminar el registro";
    }else{

        echo  "<script>
        alert('El registro fue eliminado exitosamente');
        window.location= 'consultaregistroproveedores.php'
        </script>";
 
    }
?>