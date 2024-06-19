<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estiloMostrar.css">
</head>
<body>
    <h1 style="font-size: 36px; text-align: center; color:#ffffff;">Asignaturas</h1>
    <table class="tabla-asignaturas">
        <tr>
            <th>Nombre de la Asignatura</th>
        </tr>

        <?php
        // conexión a la base de datos
        $host = 'localhost';
        $nom = 'id22199835_elodies';
        $pass = 'Kaluka1.';
        $db = 'id22199835_proyecto';

        //  conexión
        $conn = new mysqli($host, $nom, $pass, $db);

        // Verifica
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Consulta para obtener las asignaturas
        $sql = "SELECT * FROM asignaturas";
        $result = $conn->query($sql);

        // si hay resultados
        if ($result->num_rows > 0) {
            // Imprime cada fila de la tabla
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["nomasig"] . "</td></tr>";
            }
        } else {
            // no hay asignaturas
            echo "<tr><td colspan='1'>No tienes ninguna asignatura agregada.</td></tr>";
        }

        // Cierra la conexión
        $conn->close();
        ?>
    </table>

    <div class="center-text">
    <p style="font-size: 20px; font-weight: bold;">¿Qué desea hacer?</p>
    </div>

    <?php
    // Agregar o eliminar asignaturas
    echo "<p><a href='agregar_asignaturas.php' class='boton-consultar'>Agregar asignatura</a></p>";
    echo "<p><a href='eliminar_asignaturas.php' class='boton-consultar'>Eliminar asignatura</a></p>";
    echo "<p><a href='menu.php' class='boton-consultar'>Menu de opciones</a></p>";
    ?>
</body>
</html>
