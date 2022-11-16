<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="formulario";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
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
    <link href="./styles/formulario.css" rel="stylesheet" type="text/css" />
    <link href="./styles/estilosindex.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>Registro</title>
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

<a href="menuempleados.php" class='logo'>
<img src="/CargasImagenes/<?php echo $ruta_img;?>"/>
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
		<!-- SECCIÓN DEL FORMULARIO -->
		<section>
			<h1>REGISTRO DE CLIENTES</h1>
			<form action="#" class="formulario" id="formulario" name="formulario" method="POST">
                <div class='field'>
					
		        <input name='razonsocial' type='name' placeholder='Razón Social' required autocomplete />
				</div>
				<div class='field'>
					
					<input name='cuitcuil' type='number' placeholder='CUIL/CUIT' required autocomplete />
				</div>
				<div class='field'>
					<select name='condicionfiscal' required>
						<option selected disabled>Condición Fiscal</option>
						<option type="radio" value="Consumidor Final">Consumidor Final</option>
						<option type="radio" value="Responsable Inscripto">Responsable Inscripto</option>
						<option type="radio" value="Exento">Exento</option>
					</select>
				</div>
				<div class='field'>
					<select name='tipo' required>
						<option selected disabled>Tipo</option>
						<option type="radio" value="Cliente">Cliente</option>
						<option type="radio" value="Proveedor">Proveedor</option>
						<option type="radio" value= "Cliente/Proveedor">Cliente/Proveedor</option>
						<option type="radio" value="Revendedor">Revendedor</option>
						
					</select>
				</div>
				<div class='field'>
					
					<input name='email' type='email' placeholder='Correo electrónico' required autocomplete />
				</div>
				<div class='field'>
					
					<input name='telefono' type='number' placeholder='Teléfono: 10 dígitos' required autocomplete />
</div>
				

				<div class='field'> </div>
				<div class='field'> </div>
				<div class='field'>
					
					<input id='direccion' name='direccion' type='text' placeholder='Dirección: Calle y Altura' required autocomplete />
					<input name='localidad' type='text' placeholder='Localidad' required autocomplete />
<input name='provincia' type='text' placeholder='Provincia' required autocomplete />
</div>
				<div class="privacidad">
					<input type="checkbox" required>
					<label>He leído y acepto las políticas de privacidad</label>
				</div>
				<input type="submit" class="btn" name="registrarse" value="Registrar">
			</form>
			
		</section>
	

		
	</main>
</body>

<footer>

	Funes Agrocentro - Todos los Derechos Rerservados &copy; 2022

</footer>

</html>
<?php
	if(isset($_POST['registrarse'])){
		$id=$_POST["id"];
		$razonsocial =$_POST["razonsocial"];
		$cuitcuil=$_POST["cuitcuil"];
		$condicionfiscal=$_POST["condicionfiscal"];
		$tipo=$_POST["tipo"];
		$email=$_POST["email"];
		$telefono=$_POST["telefono"];
        $direccion=$_POST["direccion"];
        $localidad=$_POST["localidad"];
        $provincia=$_POST["provincia"];

		$insertarDatos = "INSERT INTO registro VALUES('$id',
			                                        '$razonsocial',
													'$cuitcuil',
													'$condicionfiscal',
													'$tipo',
                                                    '$email',
                                                    '$telefono',
                                                    '$direccion',
                                                    '$localidad',
													'$provincia')";

		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);
      
		if(!$ejecutarInsertar){
			echo "<script>
			alert('Este CUIL/CUIT ya está registrado');
			window.location= 'registroparaempleados.php'
			</script>";
		}else{
	
			echo  "<script>
			alert('Tu registro fue completado exitosamente');
			window.location= 'menuempleados.php'
			</script>";
	
		}
		
	}

	
?>