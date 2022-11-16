<?php
// Archivo de conexion con la base de datos
require_once 'cargarproductos/Conexion.php';
// Condicional para validar el borrado de la imagen
if(isset($_GET['delete_id']))
{
	// Selecciona imagen a borrar
	$stmt_select = $DB_con->prepare('SELECT Imagen_Img FROM tbl_imagenes WHERE Imagen_ID =:uid');
	$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
	$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
	// Ruta de la imagen
	unlink("imagenes/".$imgRow['Imagen_Img']);
	
	// Consulta para eliminar el registro de la base de datos
	$stmt_delete = $DB_con->prepare('DELETE FROM tbl_imagenes WHERE Imagen_ID =:uid');
	$stmt_delete->bindParam(':uid',$_GET['delete_id']);
	$stmt_delete->execute();
	// Redireccioa al inicio
	header("Location: index3.php");
}

?>


<!DOCTYPE html>
<html lang="es-ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Esta descripción es la que aparece en los buscadores debajo de la URL" />
	<link rel="stylesheet" href="cargarproductos/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="cargarproductos/bootstrap/css/bootstrap-theme.min.css">
	<link href="styles/estilosindex.css" rel="stylesheet" type="text/css" />
	<link href="styles/resets.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>Maquinarias Agricolas</title>
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

	<div class="row">
    <?php
	
	$stmt = $DB_con->prepare('SELECT Imagen_ID, Imagen_Marca, Imagen_Tipo, Imagen_Img FROM tbl_imagenes ORDER BY Imagen_ID DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
    <div class="col-xs-3">
      <p class="page-header"><?php echo $Imagen_Marca."&nbsp;/&nbsp;".$Imagen_Tipo; ?></p>
      <img src="cargarproductos/imagenes/<?php echo $row['Imagen_Img']; ?>" class="img-rounded" width="250px" height="250px" />
      
    </div>
    <?php
		}
	}
	else
	{
		?>
    <div class="col-xs-12">
      <div class="alert alert-warning"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Datos no encontrados ... </div>
    </div>
    <?php
	}
	
?>


	<main>
	


		<a class="contactanos" href="index.html#abajo"><abbr title="Consultas"><img width="49px" height="48px" alt="Consultas" src="img/contactanos.jpg"/></abbr></a> 
		<a class="ubicacion" href="index.html#abajo"><abbr title="Ubicación"><img width="49px" height="48px" alt="Ubicación" src="img/ubicacion.jpg"/></abbr></a>
		<a class="escribenos" href="index.html#abajo"><abbr title="Escríbenos"><img width="49px" height="48px"alt="Escríbenos" src="img/escribenos.jpg"/></abbr></a> 
	</main>
	<script src="/cargarproductos/bootstrap/js/bootstrap.min.js"></script>
</body>

<footer>

	Funes Agrocentro - Todos los Derechos Reservados &copy; 2022

</footer>

</html>