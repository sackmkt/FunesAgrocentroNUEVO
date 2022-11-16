<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="formulario";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}


    
	$id =$_POST["id"];
	$razonsocial =$_POST["razonsocial"];
	$cuit=$_POST["cuit"];
	$email=$_POST["email"];
	$telefono=$_POST["telefono"];
    $direccion=$_POST["direccion"];
    $localidad=$_POST["localidad"];
    $provincia=$_POST["provincia"];

    $actualizar="UPDATE registroproveedores SET razonsocial='$razonsocial', cuit='$cuit', email='$email', telefono='$telefono', direccion='$direccion', localidad='$localidad', provincia='$provincia' WHERE id_proveedor='$id'";

    $EjecutarActualizar = mysqli_query($enlace, $actualizar);

    if(!$EjecutarActualizar){
        echo"No se pudo modificar el registro";
    }else{

        echo  "<script>
        alert('El registro fue modificado exitosamente');
        window.location= 'consultaregistroproveedores.php'
        </script>";

    }

?>



