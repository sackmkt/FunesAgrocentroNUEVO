<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="/CargasImagenes/<?php echo $ruta_img;?>" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Bootstrap
    </a>
  </div>
</nav>
<br>
<br>
    

<div>
    <img src="/CargasImagenes/<?php echo $ruta_img;?>" alt="Imagen del logo de la empresa" width="10%"/> 
</div>

<br>
   <br>

</body>
<footer class="footer">
    Todos los derechos reservados - FunesAgrocentro S.A.
</footer>


</body>
</html>