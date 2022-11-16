<?php
error_reporting( ~E_NOTICE );	
require_once 'Conexion.php';

if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	$stmt_edit = $DB_con->prepare('SELECT Imagen_Marca, Imagen_Tipo, Imagen_Img FROM tbl_imagenes WHERE Imagen_ID =:uid');
	$stmt_edit->execute(array(':uid'=>$id));
	$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
	extract($edit_row);
}
else
{
	header("Location: index3.php");
}	

if(isset($_POST['btn_save_updates']))
{
	$username = $_POST['user_name'];// user name
	$userjob = $_POST['user_job'];// user email
		
	$imgFile = $_FILES['user_image']['name'];
	$tmp_dir = $_FILES['user_image']['tmp_name'];
	$imgSize = $_FILES['user_image']['size'];
				
	if($imgFile)
	{
		$upload_dir = 'cargarproductos/imagenes/'; // upload directory	
		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		$userpic = rand(1000,1000000).".".$imgExt;
		if(in_array($imgExt, $valid_extensions))
		{			
			if($imgSize < 1000000)
			{
				unlink($upload_dir.$edit_row['Imagen_Img']);
				move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			}
			else
			{
				$errMSG = "Su archivo es demasiado grande mayor a 1MB";
			}
		}
		else
		{
			$errMSG = "Solo archivos JPG, JPEG, PNG & GIF .";		
		}	
	}
	else
	{
		// if no image selected the old image remain as it is.
		$userpic = $edit_row['Imagen_Img']; // old image from database
	}	
					
	
	// if no error occured, continue ....
	if(!isset($errMSG))
	{
		$stmt = $DB_con->prepare('UPDATE tbl_imagenes 
									 SET Imagen_Marca=:uname, 
										 Imagen_Tipo=:ujob, 
										 Imagen_Img=:upic 
								   WHERE Imagen_ID=:uid');
		$stmt->bindParam(':uname',$username);
		$stmt->bindParam(':ujob',$userjob);
		$stmt->bindParam(':upic',$userpic);
		$stmt->bindParam(':uid',$id);
			
		if($stmt->execute()){
			?>
<script>
			alert('Archivo editado correctamente ...');
			window.location.href='index3.php';
			</script>
<?php
		}
		else{
			$errMSG = "Los datos no fueron actualizados !";
		}		
	}						
}	
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Subir, Insertar, Actualizar, Borrar una imágen usando PHP y MySQL</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link href="/styles/estilosindex.css" rel="stylesheet" type="text/css" />
	<link href="/styles/resets.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/jquery.min.js"></script>
</head>
<body>
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
<body>

<div class="container">
  <div class="page-header">
    <h1 class="h2">Actualización producto. <a class="btn btn-default" href="index3.php"> Mostrar todos los modelos </a></h1>
  </div>
  <div class="clearfix"></div>
  <form method="post" enctype="multipart/form-data" class="form-horizontal">
    <?php
	if(isset($errMSG)){
		?>
    <div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?> </div>
    <?php
	}
	?>
    <table class="table table-bordered table-responsive">
      <tr>
        <td><label class="control-label">Marca.</label></td>
        <td><input class="form-control" type="text" name="user_name" value="<?php echo $Imagen_Marca; ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Tipo.</label></td>
        <td><input class="form-control" type="text" name="user_job" value="<?php echo $Imagen_Tipo; ?>" required /></td>
      </tr>
      <tr>
        <td><label class="control-label">Imágen.</label></td>
        <td><p><img src="imagenes/<?php echo $Imagen_Img; ?>" height="150" width="150" /></p>
          <input class="input-group" type="file" name="user_image" accept="image/*" /></td>
      </tr>
      <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default"> <span class="glyphicon glyphicon-save"></span> Actualizar </button>
          <a class="btn btn-default" href="/menuempleados.php"> <span class="glyphicon glyphicon-backward"></span> cancelar </a></td>
      </tr>
    </table>
  </form>

</div>
</body>
<footer>

	Funes Agrocentro - Todos los Derechos Rerservados &copy; 2022

</footer>

</html>