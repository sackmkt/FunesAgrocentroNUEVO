<?php
// recibimos los datos de la imagen 
$nombre_imagen = $_FILES['imagen']['name'];

$tipo_imagen = $_FILES['imagen']['type'];

$tamano_imagen = $_FILES['imagen']['size'];


// Limitar tamano de la imagen que se sube al servidor
if ($tamano_imagen <= 2000000) 
{
    if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/gif") 
    {
        // Carpeta de destino en el servidor
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/CargasImagenes/';

        // Se mueve la imagen del directorio temportal, al directorio seleccionado
        move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $nombre_imagen);

    } 
    else 
    {
        echo "Solo se permite subir imagenes";
    }
} 
else 
{
    echo "El tamaño de la imagen es demasiado grande";
}

require("datos_conexion.php");

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
    if(mysqli_connect_errno())
    {
        echo "Fallo en la conexion con la base de datos";
        exit();
    }

    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BD");
    mysqli_set_charset($conexion, "utf8");
    
    $sql="UPDATE cambiologo SET foto='$nombre_imagen' WHERE codigo='0001'";
    $resultado=mysqli_query($conexion, $sql); 

    header("Location: index.php");
    exit;

?>
