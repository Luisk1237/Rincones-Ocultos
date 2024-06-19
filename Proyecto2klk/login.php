<?php
session_start();
include('conexion.php');

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$nombre = $_POST["txtnombre"] ?? '';
$pas = $_POST["txtpassword"] ?? '';
// Verificar que los campos no estén vacíos
if (!empty($nombre) && !empty($pas)) {
    // Verificar que la conexión se ha establecido
    if ($mysqli) {
        // Realizar la consulta SQL de manera segura
        $query = "SELECT * FROM registrar WHERE nombre = ? AND pas = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ss', $nombre, $pas);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar si se encontró un registro
        if ($result->num_rows == 1) {
            // Obtener el ID del usuario y almacenar en la sesión
            $row = $result->fetch_assoc();
            $_SESSION['id_usuario'] = $row['id'];
            $_SESSION['usuarioingresado'] = $nombre;

            // Redirigir al menú
            header("Location: menu.php");
            exit();
        } else {
            // Mostrar mensaje de error y redirigir a la página de inicio de sesión
            echo "<script>alert('Nombre de usuario o contraseña incorrectos.'); window.location.href='index.php';</script>";
        }

        // Cerrar la conexión y liberar recursos
        $stmt->close();
        $mysqli->close();
    } else {
        die("La conexión a la base de datos falló.");
    }
} else {
    // Mostrar mensaje de error si falta algún campo
    echo "<script>alert('Todos los campos son obligatorios.'); window.location.href='index.php';</script>";
}
} else {
// Redirigir al usuario a la página de inicio de sesión si no se enviaron datos por POST
header("Location: index.php");
exit();
}
?>