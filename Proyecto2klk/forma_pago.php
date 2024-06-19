<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Forma de Pago</title>
    <link rel="stylesheet" href="estiloMenu.css">
     <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #eaeaea; /* Cambiar el color de fondo a un gris clarito */
}
        .center-text {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #080808;
            text-align: center;
            margin-top: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            font-size: 16px;
        }
        input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .error-message {
            color: red;
            margin-top: 5px;
        }
        button {
            padding: 10px;
            font-size: 18px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="center-text">
        <h1>Agregar Forma de Pago</h1>
    </div>
    <div class="container">
        <form action="procesar_pago.php" method="POST" onsubmit="return validateForm()">
            <label for="numero_cuenta">Número de Cuenta</label>
            <input type="text" id="numero_cuenta" name="numero_cuenta" required>
            <label for="nombre_titular">Nombre del Titular</label>
        <input type="text" id="nombre_titular" name="nombre_titular" required>

        <label for="fecha_vencimiento">Fecha de Vencimiento</label>
        <input type="text" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="MM/AA" required>

        <label for="cvv">Código CVV</label>
        <input type="text" id="cvv" name="cvv" maxlength="4" required>
        <span id="cvv-error" class="error-message"></span>

        <button type="submit">Agregar</button>
    </form>
</div>

<script>
    function validateForm() {
        var cvvInput = document.getElementById('cvv');
        var cvvValue = cvvInput.value.trim();

        if (cvvValue.length > 4) {
            document.getElementById('cvv-error').textContent = 'El CVV no puede tener más de 4 caracteres.';
            return false;
        }

        document.getElementById('cvv-error').textContent = '';
        return true;
    }

    document.getElementById('cvv').addEventListener('input', function(event) {
        var cvvInput = event.target;
        var cvvValue = cvvInput.value.trim();

        if (cvvValue.length > 4) {
            cvvInput.value = cvvValue.slice(0, 4);
            alert('El CVV no puede tener más de 4 caracteres.');
        }
    });
</script>
</body>
</html> 