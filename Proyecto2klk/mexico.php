<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado Seleccionado</title>
    <link rel="stylesheet" href="estiloMenu.css">
   <style>
     body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .center-text {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .estado-card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 300px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        .estado-card img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .estado-card p {
            font-size: 18px;
            margin: 10px 0;
        }
        .estado-card a {
            display: block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        .estado-card a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="center-text">
        <h1>Estado Seleccionado</h1>
    </div>
    <div class="container">
        <div class="estado-card">
            <?php
            if (isset($_GET['estado'])) {
                $estado = $_GET['estado'];
                echo "<img src='img/{$estado}.jpg' alt='{$estado}'>";
                echo "<p>Has seleccionado el estado de {$estado}</p>";
            } else {
                echo "<p>No se ha seleccionado ningún estado.</p>";
            }
            ?>
            <a href="menu.php">Volver al Menú</a>
        </div>
    </div>
</body>
</html>

