<?php
$servidor="localhost";
$usuario="root";
$clave="";
$baseDeDatos="formulario";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if(!$enlace){
    echo"Error en la conexion con el servidor";
}

$correo = $_POST['txtcorreo'];

$queryusuario 	= mysqli_query($enlace,"SELECT * FROM login WHERE correo = '$correo'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar		= mysqli_fetch_array($queryusuario); 
$enviarpass 	= $mostrar['contraseña'];

$paracorreo 		= $correo;
$titulo				= "Recuperar contraseña";
$mensaje			= "Tu contraseña es:" .$enviarpass;
$tucorreo			= "From: rocio.nuvoli@hotmail.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
	echo "<script> alert('Contraseña enviada');window.location= 'login.php' </script>";
}else
{
	echo "<script> alert('Error');window.location= 'login.php' </script>";
}
}
else
{
	echo "<script> alert('Este correo no existe');window.location= 'login.php' </script>";
}

?>