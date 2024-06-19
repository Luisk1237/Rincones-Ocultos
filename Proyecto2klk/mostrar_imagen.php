<?php
session_start();
include('conexion.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obtener la ruta de la imagen
    $query = "SELECT imagen FROM registrar WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $imagen = $row['imagen'];

        // Mostrar la imagen
        header("Content-type: image/jpeg"); // Tipo de la imagen
        echo file_get_contents($imagen);
    } else {
        echo "Imagen no encontrada";
    }
} else {
    echo "ID de imagen no especificado";
}

mysqli_close($conn);
?>
