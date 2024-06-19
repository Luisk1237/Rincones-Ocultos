<?php
session_start();

// Verificar si la sesión está activa
if (isset($_SESSION['usuarioingresado'])) {
    // Destruir la sesión
    session_unset();
    session_destroy();
}

// Redirigir al usuario a la página de inicio de sesión
header("Location: login.php");
exit();
?>
