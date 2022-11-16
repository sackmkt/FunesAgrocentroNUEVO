<?php
// Archivo de conexion con la base de datos
require_once 'Conexion.php';
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
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=yes" />
<title>Subir imagen al servidor usando PDO MySQL</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link href="/styles/estilosindex.css" rel="stylesheet" type="text/css" />
	<link href="/styles/resets.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">

<script src="bootstrap/js/jquery.min.js"></script>
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
	<a href="../menuempleados.php" class='logo'>
			<img src="/CargasImagenes/<?php echo $ruta_img;?>"/>
		</a>
		<div class="options">
			<img src="/img/Search.png" />
			<div id='user'>
				<img src="/img/User.png" />
				<div class="userMenu">
					<a href="../menuempleados.php">Salir</a>
				</div>
			</div>
		</div>
	</header>

<div class="container">
  <div class="page-header">
    <h1 class="h2">Productos cargados.<a class="btn btn-default" href="AgregarNuevo.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Agregar nuevo</a></h1>
  </div>
  <br />
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
      <img src="imagenes/<?php echo $row['Imagen_Img']; ?>" class="img-rounded" width="250px" height="250px" />
      <p class="page-header"> <span> <a class="btn btn-info" href="EditarImagen.php?edit_id=<?php echo $row['Imagen_ID']; ?>" title="click for edit" onclick="return confirm('Esta seguro de editar el archivo ?')"><span class="glyphicon glyphicon-edit"></span> Editar</a> <a class="btn btn-danger" href="?delete_id=<?php echo $row['Imagen_ID']; ?>" title="click for delete" onclick="return confirm('Esta seguro de eliminar el archivo?')"><span class="glyphicon glyphicon-remove-circle"></span> Borrar</a> </span> </p>
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
  </div>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
<footer>

	Funes Agrocentro - Todos los Derechos Reservados &copy; 2022

</footer>
</html>