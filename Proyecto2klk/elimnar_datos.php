<?php
// Incluir el archivo de conexión
include('conexion.php');

// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión y obtener el ID de usuario
if (!isset($_SESSION['id'])) {
    echo "Error: No se ha iniciado sesión correctamente.";
    exit;
}

// Obtener el ID de usuario desde la sesión
$id_usuario = $_SESSION['id'];

// Consulta SQL para obtener todos los datos de forma_pago del usuario actual
$query = "SELECT id, numero_cuenta, nombre_titular, fecha_vencimiento, cvv FROM forma_pago WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_usuario); // Usamos el ID de usuario almacenado en sesión
$stmt->execute();
$result = $stmt->get_result();

// Verificar si hay resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Número de Cuenta</th>
                <th>Nombre del Titular</th>
                <th>Fecha de Vencimiento</th>
                <th>CVV</th>
                <th>Acción</th>
            </tr>";
    // Iterar sobre los resultados y mostrar cada fila en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['numero_cuenta'] . "</td>
                <td>" . $row['nombre_titular'] . "</td>
                <td>" . $row['fecha_vencimiento'] . "</td>
                <td>" . $row['cvv'] . "</td>
                <td><a href='eliminar_dato.php?id=" . $row['id'] . "&id_usuario=" . $id_usuario . "'>Eliminar dato</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron datos.";
}

// Cerrar la consulta y la conexión
$stmt->close();
$mysqli->close();
?>

