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
	<link href="./styles/formulario.css" rel="stylesheet" type="text/css" />
	<link href="./styles/estilosindex.css" rel="stylesheet" type="text/css" />
	<link href="./styles/resets.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>Registro</title>
</head>

<body>
	<header>
		<a href="" class='logo'>
			<img src="./img/logo_funes.png" />
		</a>
		<nav id="menu">
			<a href="index.html">Inicio</a>
			<a href="quienessomos.html">¿Quiénes somos?</a>
			<div id= "NP">
				<a href="">Nuestros Productos</a>
				<div class="NPMenu">
					<a href="maquinariaagricola.html">Maquinaria Agrícola</a>
					<a href="maquinariavial.html">Maquinaria Vial</a>
					<a href="insumosagropecuarios.html">Insumos Agropecuarios</a>
					<a href="repuestos.html">Repuestos</a>
				</div>
			</div>
			 
			<a href="contacto.html">Contacto</a>
		</nav>
		<div class="options">
			<img src="./img/Search.png" />
			<div id='user'>
				<img src="./img/User.png" />
				<div class="userMenu">
				<a href="login.html">Login Empleados</a>
					<a href="registro.php">Registrarme</a>
				</div>
			</div>
		</div>

	</header>
    <main>
        <!-- SECCIÓN DE LA TABLA -->
        <section>
			<h1>CONSULTA DE REGISTROS</h1>
        <div class="tabla">
			<table>
				<tr>
					<th>Razón Social</th>
					<th>CUIL/CUIT</th>
					<th>Condición Fiscal</th>
					<th>Tipo</th>
                    <th>Correo electrónico</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
					
				  </tr>


                <?php
						$consulta = "SELECT * FROM registro";
						$ejecutarConsulta = mysqli_query($enlace, $consulta);
						$verFilas = mysqli_num_rows($ejecutarConsulta);
						$fila = mysqli_fetch_array($ejecutarConsulta);

						if(!$ejecutarConsulta){
							echo"Error en la consulta";
						}else{
							if($verFilas<1){
								echo"<tr><td>Sin registros</td></tr>";
							}else{
								for($i=0; $i<=$fila; $i++){
									echo'
										<tr>
											<td>'.$fila[0].'</td>
											<td>'.$fila[1].'</td>
											<td>'.$fila[2].'</td>
											<td>'.$fila[3].'</td>
                                            <td>'.$fila[4].'</td>
                                            <td>'.$fila[5].'</td>
                                            <td>'.$fila[6].'</td>
                                            <td>'.$fila[7].'</td>
											<td>'.$fila[8].'</td>
	
										</tr>
                                    
			

									';
									$fila = mysqli_fetch_array($ejecutarConsulta);
                                   
									


								}

							}
						}


					?>
						
						
				
				
			</table>
		</div>


		</main>
</body>

<footer>

	Funes Agrocentro - Todos los Derechos Reservados &copy; 2022

</footer>

</html>

