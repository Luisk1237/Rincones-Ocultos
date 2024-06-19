<?php
// Incluir el archivo de conexión
include('conexion.php');

// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión y obtener el ID de usuario
if (!isset($_SESSION['id_usuario'])) {
    echo "Error: No se ha iniciado sesión correctamente.";
    exit;
}
$id_usuario = $_SESSION['id_usuario'];

// Verificar si el usuario ya tiene una forma de pago registrada
$query_existencia = "SELECT id FROM forma_pago WHERE id = ?";
$stmt_existencia = $mysqli->prepare($query_existencia);
$stmt_existencia->bind_param("i", $id_usuario);
$stmt_existencia->execute();
$result_existencia = $stmt_existencia->get_result();

$message = '';

if ($result_existencia->num_rows > 0) {
    // Si ya existe una forma de pago, actualizar los datos existentes
    $numero_cuenta = $_POST['numero_cuenta'];
    $nombre_titular = $_POST['nombre_titular'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $cvv = $_POST['cvv'];

    $query_actualizar = "UPDATE forma_pago SET numero_cuenta = ?, nombre_titular = ?, fecha_vencimiento = ?, cvv = ? WHERE id = ?";
    $stmt_actualizar = $mysqli->prepare($query_actualizar);
    $stmt_actualizar->bind_param("ssssi", $numero_cuenta, $nombre_titular, $fecha_vencimiento, $cvv, $id_usuario);

    if ($stmt_actualizar->execute()) {
        $message = "Se ha actualizado la forma de pago correctamente.";
    } else {
        $message = "Error al actualizar la forma de pago: " . $stmt_actualizar->error;
    }
} else {
    // Si no existe una forma de pago, insertar una nueva
    $numero_cuenta = $_POST['numero_cuenta'];
    $nombre_titular = $_POST['nombre_titular'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $cvv = $_POST['cvv'];

    $query_insertar = "INSERT INTO forma_pago (id, numero_cuenta, nombre_titular, fecha_vencimiento, cvv) VALUES (?, ?, ?, ?, ?)";
    $stmt_insertar = $mysqli->prepare($query_insertar);
    $stmt_insertar->bind_param("issss", $id_usuario, $numero_cuenta, $nombre_titular, $fecha_vencimiento, $cvv);

    if ($stmt_insertar->execute()) {
        $message = "Se ha agregado la forma de pago correctamente.";
    } else {
        $message = "Error al agregar la forma de pago: " . $stmt_insertar->error;
    }
}

// Cerrar las consultas y la conexión
$stmt_existencia->close();
if (isset($stmt_actualizar)) {
    $stmt_actualizar->close();
}
if (isset($stmt_insertar)) {
    $stmt_insertar->close();
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proceso de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        .message {
            font-size: 24px;
            font-weight: bold;
            color: #4caf50;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .buttons button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .buttons button:hover {
            background-color: #ddd;
        }
        .buttons .cerrar-sesion {
            background-color: #f44336;
            color: #fff;
        }
        .buttons .ver-datos {
            background-color: #2196f3;
            color: #fff;
        }
        .buttons .eliminar-datos {
            background-color: #ff9800;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message"><?php echo $message; ?></div>
        <div class="buttons">
            <form action="cerrar_sesion.php" method="post">
                <button type="submit" class="cerrar-sesion">Cerrar Sesión</button>
            </form>
            <form action="ver_mis_datos.php" method="post">
                <button type="submit" class="ver-datos">Ver Datos</button>
            </form>
        </div>
    </div>
</body>
</html>


