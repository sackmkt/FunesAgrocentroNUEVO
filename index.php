<!DOCTYPE html>
<html lang="es-ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Esta descripción es la que aparece en los buscadores debajo de la URL" />
	<link href="./styles/estilosindex.css" rel="stylesheet" type="text/css" />
	<link href="./styles/resets.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>Funes Agrocentro</title>
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
					<a href="login.php">Login Empleados</a>
				</div>
			</div>
		</div>

	</header>
	<main>
		<div class="slider">
			<ul>
			<li><img src="img/tractor.jpg" alt=""></li>
			<li><img src="img/desmalezadora.jpg" alt=""></li>
			<li><img src="img/vacas.jpg" alt=""></li>
			<li><img src="img/maquinariavial.jpg" alt=""></li>
			
			</ul>
		</div>

		<div class="class servicios">
			<section class="servicio" id="abajo">
				<h3> Consultas</h3>
				<div class="iconos">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
					  </svg>
				</div>
				<p>Casa Central: +54(0351)4998781</p>
				<p>Venta de equipos: +54(0351)5900712</p>
				<p>Repuestos: +54(0351)2295204</p>
			</section>

			<section class="servicio">
			  <h3> Ubicación</h3>
				<div class="iconos">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-current-location" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<circle cx="12" cy="12" r="3" />
						<circle cx="12" cy="12" r="8" />
						<line x1="12" y1="2" x2="12" y2="4" />
						<line x1="12" y1="20" x2="12" y2="22" />
						<line x1="20" y1="12" x2="22" y2="12" />
						<line x1="2" y1="12" x2="4" y2="12" />
					  </svg>
				</div>
				<p>Juan B Justo 10500</p>
				<p>Código Postal: 5145</p>
				<p>Córdoba, Argentina</p>
			</section>

			<section class="servicio">
				<h3> Escríbenos </h3>
				<div class="iconos">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<rect x="3" y="5" width="18" height="14" rx="2" />
						<polyline points="3 7 12 13 21 7" />
					  </svg>
				</div>
				<p>Ventas de equipos y consultas: leandrofunes@grupofunes.com.ar</p>
				<p>Repuestos: repuestos@grupofunes.com.ar</p>
			</section>
		</div>

		

		<a class="contactanos" href="#abajo"><abbr title="Consultas"><img width="49px" height="48px" alt="Consultas" src="img/contactanos.jpg"/></abbr></a> 
		<a class="ubicacion" href="#abajo"><abbr title="Ubicación"><img width="49px" height="48px" alt="Ubicación" src="img/ubicacion.jpg"/></abbr></a>
		<a class="escribenos" href="#abajo"><abbr title="Escríbenos"><img width="49px" height="48px"alt="Escríbenos" src="img/escribenos.jpg"/></abbr></a> 

        
	</main>
</body>

<footer>

	Funes Agrocentro - Todos los Derechos Reservados &copy; 2022

</footer>

</html>