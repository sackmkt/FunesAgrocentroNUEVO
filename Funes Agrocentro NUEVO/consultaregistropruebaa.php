<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="formulario";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
    
    $consulta="SELECT * FROM registro";
?>
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
    <link href="./styles/consultaregistro.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>Consultar Registros</title>
</head>

<header>
<a href="index.html" class='logo'>
			<img src="./img/logo_funes.png"/>
		</a>
<div class="options">
			<img src="./img/Search.png" />
			<div id='user'>
				<img src="./img/User.png" />
				<div class="userMenu">
					<a href="menuempleados.html">Menú Empleados</a>
				</div>
			</div>
		</div>

</header>        

<body>
	
	     
	<main>

     <h1>CONSULTA DE REGISTRO DE CLIENTES</h1>
		<div class="contenedor">
           

           <div class="titulocolumna">Razón Social</div>
           <div class="titulocolumna">CUIL/CUIT</div>
           <div class="titulocolumna">Condición Fiscal</div>
           <div class="titulocolumna">Tipo</div>
           <div class="titulocolumna">Correo electrónico</div>
           <div class="titulocolumna">Teléfono</div>
           <div class="titulocolumna">Dirección</div>
           <div class="titulocolumna">Localidad</div>
           <div class="titulocolumna">Provincia</div>
		   <div class="titulocolumna"></div>

            <?php $resultado =mysqli_query($enlace, $consulta);
            while($row=mysqli_fetch_assoc($resultado)) { ?>
           
		   
           <div class="itemtabla"><?php echo $row["razonsocial"];?></div>
           <div class="itemtabla"><?php echo $row["cuitcuil"];?></div>
           <div class="itemtabla"><?php echo $row["condicionfiscal"];?></div>
           <div class="itemtabla"><?php echo $row["tipo"];?></div>
           <div class="itemtabla"><?php echo $row["email"];?></div>
           <div class="itemtabla"><?php echo $row["telefono"];?></div>
           <div class="itemtabla"><?php echo $row["direccion"];?></div>
           <div class="itemtabla"><?php echo $row["localidad"];?></div>
           <div class="itemtabla"><?php echo $row["provincia"];?></div>
           <div class="itemtabla">
            <a href="actualizar.php?id=<?php echo $row ["id_registro"];?>" class="editaritemtabla">Editar</a>
            <a href="procesareliminar.php?id=<?php echo $row["id_registro"];?>" class="eliminaritemtabla">Eliminar</a>
			
		
		    </div>
			

            <?php } mysqli_free_result($resultado);?>

            </div>
		    <script src="confirmareliminar.js"></script>
	 </main>
</body>

<footer>

	Funes Agrocentro - Todos los Derechos Rerservados &copy; 2022

</footer>

</html>
