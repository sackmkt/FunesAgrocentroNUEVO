<!DOCTYPE html>
<html lang="es-ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Esta descripción es la que aparece en los buscadores debajo de la URL" />
	<link href="./styles/estilosindex.css" rel="stylesheet" type="text/css" />
	<link href="./styles/resets.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>¿Quiénes somos?</title>
</head>

<body>
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
	<header>
	<a href="index.php" class='logo'>
			<img src="/CargasImagenes/<?php echo $ruta_img;?>"/>
		</a>
		<nav id="menu">
			<a href="index.php">Inicio</a>
			<a href="quienessomos.php">¿Quiénes somos?</a>
			<div id= "NP">
				<a href="">Nuestros Productos</a>
				<div class="NPMenu">
					<a href="maquinariaagricola.php">Maquinaria Agrícola</a>
				<!--<a href="maquinariavial.php">Maquinaria Vial</a>
					<a href="insumosagropecuarios.php">Insumos Agropecuarios</a>
					<a href="repuestos.php">Repuestos</a> -->
				</div>
			</div>
			 
			<a href="contacto.php">Contacto</a>
			<!--<a href="index1.php">Editar</a>-->
		</nav>
		<div class="options">
			<img src="./img/Search.png" />
			<div id='user'>
				<img src="./img/User.png" />
				<div class="userMenu">
					<a href="login.html">Login Empleados</a>
				</div>
			</div>
		</div>

	</header>
	<main>
    <p class="parrafoqs">
		Somos una empresa familiar cordobesa que nace en el año 1994, y es fundada sobre bases fuertes para satisfacer la demanda de maquinarias y accesorios del sector agrícola de todo el país. </br>
		&nbsp;&nbsp;&nbsp;&nbsp;
		Asesoramos integralmente a nuestros clientes y contamos con personal con más de 35 años de experiencia en el rubro. </br>
	</br>
		&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;
		Nuestras variadas líneas de productos satisfacen hoy las necesidades específicas de los sectores agrícolas, ganaderos, avícolas, porcinos, viales, mantenimientos de espacios verdes y otros.
	</p>

	
	<a class="contactanos" href="index.php#abajo"><abbr title="Consultas"><img width="49px" height="48px" alt="Consultas" src="img/contactanos.jpg"/></abbr></a> 
	<a class="ubicacion" href="index.php#abajo"><abbr title="Ubicación"><img width="49px" height="48px" alt="Ubicación" src="img/ubicacion.jpg"/></abbr></a>
	<a class="escribenos" href="index.php#abajo"><abbr title="Escríbenos"><img width="49px" height="48px"alt="Escríbenos" src="img/escribenos.jpg"/></abbr></a> 

	</main>

	
</body>

<footer>

	Funes Agrocentro - Todos los Derechos Reservados &copy; 2022

</footer>

</html>