<!DOCTYPE html>
<html lang="es-ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Esta descripción es la que aparece en los buscadores debajo de la URL" />
	<link href="./styles/estilosindex.css" rel="stylesheet" type="text/css" />
	<link href="./styles/resets.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>Funes Agrocentro</title>
</head>

<body>
    <!-- Conexion con la base de datos -->
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
	<a href="menuempleados.php" class='logo'>
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
<br>
<br>
    <form action="datosimagen2.php" method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>
                    <label for="imagen">Imagen:</label>
                </td>
                <td>
                    <input type="file" name="imagen" size="20">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-aling:center"><input type="submit" value="Enviar Imagen"></td>
            </tr>
        </table>
    </form>
   <br>
   <br>

</body>
<footer>

	Funes Agrocentro - Todos los Derechos Reservados &copy; 2022

</footer>
</html>