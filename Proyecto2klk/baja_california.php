<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lugares Escondidos de Baja California</title>
    <link rel="stylesheet" href="estiloMenu.css">
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('img/calif.jpg'); /* Ejemplo de ruta relativa */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
        .center-text {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .place-card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
            width: calc(33.33% - 20px);
            margin: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .place-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .place-card img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .place-card p {
            text-align: center;
            font-size: 16px;
            margin: 10px 0;
        }
        .place-card a {
            display: block;
            text-align: center;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .available {
            background-color: #4CAF50; /* Color de fondo verde para lugares disponibles */
        }
        .available:hover {
            background-color: #45a049;
        }
        .unavailable {
            background-color: red; /* Color de fondo rojo para lugares no disponibles */
        }
        .unavailable:hover {
            background-color: darkred;
        }
           h1 {
            text-align: center;
            font-size: 48px; /* Tamaño grande */
            font-weight: bold;
            color: #FF5733; /* Color naranja */
            text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff; /* Efecto de sombra */
            margin-top: 100px; /* Espacio superior */
        }

        h2 {
            text-align: center;
            font-size: 32px; /* Tamaño grande */
            color: #3498DB; /* Color azul */
            margin-bottom: 50px; /* Espacio inferior */
        }
    </style>
</head>
<body>
    <div class="center-text">
        <h1>Lugares Escondidos de Baja California</h1>
        <h2>¿A dónde quieres viajar?</h2>
    </div>
    <div class="container">
        <?php
        // Consulta para obtener los lugares escondidos de Baja California
        $sql = "SELECT * FROM lugares_escondidos WHERE estado = 'Baja California' LIMIT 6";
        $result = mysqli_query($mysqli, $sql);

        // Verificar si hay resultados y mostrar los lugares
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $nombre = $row['nombre'];
                $imagen = $row['imagen'];
                $disponibilidad = $nombre == 'Cavernas del Cerro Colorado' || $nombre == 'Tijuana';

                // Determinar la clase CSS dependiendo de la disponibilidad del lugar
                $class = $disponibilidad ? 'available' : 'unavailable';

                // Construir el enlace para seleccionar el lugar
                $link = $disponibilidad ? ($nombre == 'Cavernas del Cerro Colorado' ? "cavernas_colorado.php" : "seleccionado.php?lugar=" . urlencode($nombre)) : '#';

                ?>
                <div class="place-card <?php echo $class; ?>">
                    <img src="<?php echo $imagen; ?>" alt="<?php echo $nombre; ?>">
                    <p><?php echo $nombre; ?></p>
                    <a href="<?php echo $link; ?>">Seleccionar</a>
                </div>
                <?php
            }
        } else {
            echo "No hay lugares escondidos disponibles en Baja California actualmente.";
        }
        ?>
    </div>
</body>
</html>

