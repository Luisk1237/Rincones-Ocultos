<?php
include('conexion.php');

// Recibir datos del formulario
$nombre    = $_POST["txtnombre"];
$apellido1 = $_POST["txtapellido1"];
$apellido2 = $_POST["txtapellido2"];
$direccion = $_POST["txtdireccion"];
$num       = $_POST["txtnum"];
$correo    = $_POST["txtcorreo"];
$fecha     = $_POST["txtfecha"];
$pas       = $_POST["txtpas"];

// Consultar si el nombre ya existe en la base de datos
$queryusuario = "SELECT * FROM registrar WHERE nombre = ?";
$stmt = mysqli_prepare($mysqli, $queryusuario);
mysqli_stmt_bind_param($stmt, "s", $nombre);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

// Contar el número de filas encontradas
$nr = mysqli_num_rows($resultado);

if ($nr == 0) {
    // Preparar la consulta para insertar el nuevo usuario
    $queryregistrar = "INSERT INTO registrar(nombre, apellido1, apellido2, direccion, num, correo, fecha, pas) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = mysqli_prepare($mysqli, $queryregistrar);
    mysqli_stmt_bind_param($stmt, "ssssssss", $nombre, $apellido1, $apellido2, $direccion, $num, $correo, $fecha, $pas);

    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {
        // Obtener el último ID insertado
        $id_insertado = mysqli_insert_id($mysqli);
        echo "Último ID insertado: " . $id_insertado;

        // Mostrar un mensaje de éxito
        echo "<script> alert('Usuario registrado exitosamente'); window.location.href = 'menu.php'; </script>";
    } else {
        // Mostrar error si la inserción falla
        echo "Error: " . mysqli_error($mysqli);
    }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);
} else {
    // Mostrar mensaje si el nombre de usuario ya existe
    echo "<script> alert('El nombre de usuario ya existe. Por favor, elige otro nombre.'); window.history.back(); </script>";
}

// Cerrar la conexión
mysqli_close($mysqli);
?>
