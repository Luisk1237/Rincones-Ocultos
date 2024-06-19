<?php
$host = 'localhost';
$nom = 'id22199835_elodies';
$pass = 'Kaluka1.';
$db = 'id22199835_proyecto';

// Establecer conexión
$mysqli = new mysqli($host, $nom, $pass, $db);

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
}

// Establecer juego de caracteres utf8
if (!$mysqli->set_charset("utf8")) {
    die("Error cargando el conjunto de caracteres utf8: " . $mysqli->error);
}
?>
