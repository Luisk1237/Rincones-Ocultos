<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Viajes</title>
    <link rel="stylesheet" href="estiloMenu.css">
 <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url(img/mexico1.jpg); 
        background-size: cover; 
        background-position: center; /* Centra la imagen */
        background-repeat: no-repeat; /* Evita que la imagen se repita */
        background-attachment: fixed; /* Fija la imagen de fondo al scroll */
        background-color: #f2f2f2; /* Color de fondo alternativo si la imagen no carga */
        color: #ffffff; /* Color de texto principal en blanco */
    }

    h3 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
        color: #4CAF50; /* Verde */
        text-shadow: 1px 1px 0 #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff; /* Contorno blanco */
        margin-bottom: 20px;
    }

    p {
        font-size: 48px; /* Tamaño de la fuente más grande */
        font-family: 'Arial Black', Gadget, sans-serif;
        font-weight: bold;
        color: #CE1126; /* Rojo */
        text-shadow: 2px 2px 0 #000, -2px -2px 0 #000, 2px -2px 0 #000, -2px 2px 0 #000; /* Contorno negro */
        display: inline-block; /* Para que el contorno se aplique correctamente */
    }

    .center-text {
        text-align: center;
        color: #ebe9e2; /* Color de texto en blanco */
        margin-top: 20px;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }

    .column {
        width: calc(25% - 20px);
        margin: 10px;
        text-align: center;
    }

    .state-card {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 20px;
        width: 100%;
        max-width: 200px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .state-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    .state-card img {
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .state-card p {
        text-align: center;
        font-size: 14px;
        margin: 10px 0;
        color: #ffffff; /* Color de texto en blanco */
    }

    .state-card a {
        display: block;
        text-align: center;
        color: white;
        padding: 8px;
        text-decoration: none;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .state-card.available a {
        background-color: #4CAF50;
    }

    .state-card.available a:hover {
        background-color: #45a049;
    }

    .state-card.unavailable a {
        background-color: red;
    }

    .state-card.unavailable a:hover {
        background-color: darkred;
    }

    h1 {
        color: #080808;
        text-align: center;
        color: #ffffff; /* Color de texto en blanco */
    }
</style>
</head>
<body>
    <div class="center-text">
        <br>
        <h3>HAS SELECCIONADO A</h3>
        <p>MEXICO</p>
    </div>
    <div class="container">
        <?php
        // Consulta para obtener los estados de México
        $sql = "SELECT * FROM estados_mexico ORDER BY nombre_estado ASC"; // Ordenar por nombre del estado (ASC o DESC según necesites)
        $result = $mysqli->query($sql);

        // Verificar si hay resultados y mostrar los estados
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $estado = $row['nombre_estado'];
                // Marcamos Baja California como disponible
                $disponible = ($estado == 'Baja California');

                // Determinar la clase CSS dependiendo de la disponibilidad del estado
                $class = $disponible ? 'available' : 'unavailable';

                // Construir el enlace dependiendo de la disponibilidad
                $link = $disponible ? "baja_california.php" : '#';

                ?>
                <div class="column">
                    <div class="state-card <?php echo $class; ?>">
                        <a href="<?php echo $link; ?>">
                            <img src="<?php echo $row['imagen']; ?>" alt="<?php echo $estado; ?>">
                            <p><?php echo $estado; ?></p>
                        </a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No hay estados disponibles actualmente.";
        }
        ?>
    </div>
</body>
</html>