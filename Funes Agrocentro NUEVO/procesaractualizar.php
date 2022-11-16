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
	$cuitcuil=$_POST["cuitcuil"];
	$condicionfiscal=$_POST["condicionfiscal"];
	$tipo=$_POST["tipo"];
	$email=$_POST["email"];
	$telefono=$_POST["telefono"];
    $direccion=$_POST["direccion"];
    $localidad=$_POST["localidad"];
    $provincia=$_POST["provincia"];

    $actualizar="UPDATE registro SET razonsocial='$razonsocial', cuitcuil='$cuitcuil', condicionfiscal='$condicionfiscal', tipo='$tipo', email='$email', telefono='$telefono', direccion='$direccion', localidad='$localidad', provincia='$provincia' WHERE id_registro='$id'";

    $EjecutarActualizar = mysqli_query($enlace, $actualizar);

    if(!$EjecutarActualizar){
        echo"No se pudo modificar el registro";
    }else{

        echo  "<script>
        alert('El registro fue modificado exitosamente');
        window.location= 'consultaregistropruebaa.php'
        </script>";

    }

?>



