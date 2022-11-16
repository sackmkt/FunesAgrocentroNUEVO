<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Esta descripción es la que aparece en los buscadores debajo de la URL" />
	<link href="./styles/resets.css" rel="stylesheet" type="text/css" />
    <link href="./styles/menuempleados.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>Menú Empleados</title>
</head>

<header>
	<?php

require("datos_conexion.php");

$conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
if(mysqli_connect_errno())
{
    echo "Fallo en la conexion con la base de datos";
    exit();
}

mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BD");
mysqli_set_charset($conexion, "utf8");

$consulta="SELECT FOTO FROM CAMBIOLOGO WHERE CODIGO = '0001'";

$resultado=mysqli_query($conexion, $consulta);

while($fila=mysqli_fetch_array($resultado))
    {
        $ruta_img=$fila["FOTO"];
    }   


?>

<a href="index.php" class='logo'>
<img src="/CargasImagenes/<?php echo $ruta_img;?>"/>
		</a>
<div class="options">
			<img src="./img/Search.png" />
			<div id='user'>
				<img src="./img/User.png" />
				<div class="userMenu">
					<a href="index.php">Salir</a>
					
				</div>
			</div>
		</div>

</header>        

<body>
	
	     
	<main>

     <h1>BIENVENIDO/A</h1>
		

     <button class="btn" onclick="location.href='consultaregistropruebaa.php'">Consultar Registros de Clientes</button>
     <button class="btn" onclick="location.href='consultaregistroproveedores.php'">Consultar Registros de Proveedores</button>
     <button class="btn" onclick="location.href='registroparaempleados.php'">Registrar Clientes</button>
     <button class="btn" onclick="location.href='registroproveedores.php'">Registrar Proveedores</button>
	 <button class="btn" onclick="location.href='/cargarproductos/AgregarNuevo.php'">Gestionar productos</button>
	 <button class="btn" onclick="location.href='index2.php'">Cambiar Logo de la empresa</button>
	 


	 </main>
</body>

<footer>

	Funes Agrocentro - Todos los Derechos Rerservados &copy; 2022

</footer>

</html>
