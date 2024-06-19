<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Viajes</title>
    <link rel="stylesheet" href="estiloMenu.css">
</head>
<body>
    <div class="center-text">
        <h1>Menú de Viajes</h1>
    </div>
    <div class="container">
        <div class="column">
            <?php
            // Lista de países y sus imágenes en la primer columna
            $countries1 = [
                ['name' => 'Argentina', 'image' => 'img/argentina.jpg', 'available' => false],
                ['name' => 'Brasil', 'image' => 'img/brasil.jpg', 'available' => false],
                ['name' => 'Chile', 'image' => 'img/chile.jpg', 'available' => false],
                ['name' => 'Perú', 'image' => 'img/peru.jpg', 'available' => false],
                // Agrega más países según sea necesario
            ];

            foreach ($countries1 as $country) {
                $class = $country['available'] ? 'available' : 'unavailable';
                $link = $country['available'] ? "pais_seleccionado.php?pais=" . urlencode($country['name']) : '#';
                ?>
                <div class="country-card <?php echo $class; ?>">
                    <img src="<?php echo $country['image']; ?>" alt="<?php echo $country['name']; ?>">
                    <p><?php echo $country['name']; ?></p>
                    <a href="<?php echo $link; ?>">
                        <?php echo $country['available'] ? 'Seleccionar' : 'No Disponible'; ?>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="column">
            <?php
            // Lista de países y sus imágenes en la segunda columna
            $countries2 = [
                ['name' => 'España', 'image' => 'img/espana.jpg', 'available' => false],
                ['name' => 'Francia', 'image' => 'img/francia.jpg', 'available' => false],
                ['name' => 'Italia', 'image' => 'img/italia.jpg', 'available' => false],
                ['name' => 'Alemania', 'image' => 'img/alemania.jpg', 'available' => false],
                // Agrega más países según sea necesario
            ];

            foreach ($countries2 as $country) {
                $class = $country['available'] ? 'available' : 'unavailable';
                $link = $country['available'] ? "pais_seleccionado.php?pais=" . urlencode($country['name']) : '#';
                ?>
                <div class="country-card <?php echo $class; ?>">
                    <img src="<?php echo $country['image']; ?>" alt="<?php echo $country['name']; ?>">
                    <p><?php echo $country['name']; ?></p>
                    <a href="<?php echo $link; ?>">
                        <?php echo $country['available'] ? 'Seleccionar' : 'No Disponible'; ?>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="column">
            <?php
            // Lista de países y sus imágenes en la tercera columna
            $countries3 = [
                ['name' => 'México', 'image' => 'img/mexico.jpg', 'available' => true],
                // Agrega más países según sea necesario
            ];

            foreach ($countries3 as $country) {
                $class = $country['available'] ? 'available' : 'unavailable';
                $link = $country['available'] ? "pais_seleccionado.php?pais=" . urlencode($country['name']) : '#';
                ?>
                <div class="country-card <?php echo $class; ?>">
                    <img src="<?php echo $country['image']; ?>" alt="<?php echo $country['name']; ?>">
                    <p><?php echo $country['name']; ?></p>
                    <a href="<?php echo $link; ?>">
                        <?php echo $country['available'] ? 'Seleccionar' : 'No Disponible'; ?>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="column">
            <?php
            // Lista de países y sus imágenes en la cuarta columna
            $countries4 = [
                ['name' => 'Portugal', 'image' => 'img/portugal.jpg', 'available' => false],
                // Agrega más países según sea necesario
            ];

            foreach ($countries4 as $country) {
                $class = $country['available'] ? 'available' : 'unavailable';
                $link = $country['available'] ? "pais_seleccionado.php?pais=" . urlencode($country['name']) : '#';
                ?>
                <div class="country-card <?php echo $class; ?>">
                    <img src="<?php echo $country['image']; ?>" alt="<?php echo $country['name']; ?>">
                    <p><?php echo $country['name']; ?></p>
                    <a href="<?php echo $link; ?>">
                        <?php echo $country['available'] ? 'Seleccionar' : 'No Disponible'; ?>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
