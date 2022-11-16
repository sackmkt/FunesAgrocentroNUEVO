<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="formulario";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}

    $id=$_GET["id"];
    $consulta="SELECT * FROM registro WHERE id_registro='$id'";
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
	<title>Editar Registros</title>
</head>

<body>
	<header>
		<a href="index.html" class='logo'>
			<img src="./img/logo_funes.png" />
		</a>
		
		<div class="options">
			<img src="./img/Search.png" />
			<div id='user'>
				<img src="./img/User.png" />
				<div class="userMenu">
				    <a href="consultaregistropruebaa.php">Volver</a>
					
				</div>
			</div>
		</div>

	</header>
	<main>
           
	    <h1>EDITAR REGISTRO</h1>

		<form class="contenedor" action="procesaractualizar.php" method="POST">
        

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
         
           <input type="hidden" class="itemtabla" value="<?php echo $row["id_registro"];?>" name="id">
           <input type="text" class="itemtabla" value="<?php echo $row["razonsocial"];?>" name="razonsocial">
           <input type="text" class="itemtabla" value="<?php echo $row["cuitcuil"];?>" name="cuitcuil">
           <input type="text" class="itemtabla" value="<?php echo $row["condicionfiscal"];?>" name="condicionfiscal">
           <input type="text" class="itemtabla" value="<?php echo $row["tipo"];?>" name="tipo">
           <input type="text" class="itemtabla" value="<?php echo $row["email"];?>" name="email">
           <input type="text" class="itemtabla" value="<?php echo $row["telefono"];?>" name="telefono">
           <input type="text" class="itemtabla" value="<?php echo $row["direccion"];?>" name="direccion">
           <input type="text" class="itemtabla" value="<?php echo $row["localidad"];?>" name="localidad">
           <input type="text" class="itemtabla" value="<?php echo $row["provincia"];?>" name="provincia">

            <?php } mysqli_free_result($resultado);?>

            <input type="submit" value="Actualizar" class="contenedor_submit">

        </form>

	</main>
</body>

<footer>

	Funes Agrocentro - Todos los Derechos Rerservados &copy; 2022

</footer>

</html>
