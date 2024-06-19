<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Proyecto2Parcial</title>
     <link rel="stylesheet" href="estilo.css">
	<script src="js/reCAPTCHALogin.js"></script>
	<script src="js/reCAPTCHARegistrar.js"></script>
		
</head>
<body>
    <div class="cajafuera">
    <div class="formulariocaja">
        <div class="botondeintercambiar">
            <div id="btnvai"></div>
             <button type="button" class="botoncambiarcaja" onclick="loginvai()" id="vaibtnlogin">Login</button>
             <button type="button" class="botoncambiarcaja" onclick="registrarvai()" id="vaibtnregistrar">Registrar</button>
		</div>
		
		<!--Formulario para el login -->
        <form id="frmlogin" class="grupo-entradas" method="POST" action="login.php">
		<div class="logovai"><img src="img/escudo.png"></div>
		<b>&#128100; Nombre</b>
        <input type="text" class="cajaentradatexto" name="txtnombre" id="txtnombre" required>
		<b>&#128274; Password</b>
        <input type="password" class="cajaentradatexto" name="txtpassword" required>
		<div><b>&#10095; Verificación</b></div>
		
        <input type="text" class="cajaentradarecaptcha" id="txtrecaptcha" required>
		
		<div id="vericodigovai" onclick="crearrecaptcha()" class="fondorecaptcha">
		 
			  </div>
<!--4amp -->

        <button type="submit" class="botonenviar" name="btnloginx">Iniciar sesión</button>
        </form>
		<!--Formulario para el login -->
		
		<!--Formulario para registrar -->
        <form id="frmregistrar" class="grupo-entradas" method="POST" action="registrar.php">
				<div class="logovai"><img src="img/usuario.png"></div>
    <b>&#128100; Nombre</b>
    <input type="text" class="cajaentradatexto" name="txtnombre" required>
    <b>&#128100; Apellido Paterno</b>
    <input type="text" class="cajaentradatexto" name="txtapellido1" required>
    <b>&#128100; Apellido Materno</b>
    <input type="text" class="cajaentradatexto" name="txtapellido2" required>
    <b>&#128205; Dirección</b>
    <input type="text" class="cajaentradatexto" name="txtdireccion" required>
    <b>&#128241; Número de Teléfono</b>
    <input type="text" class="cajaentradatexto" name="txtnum" required>
    <b>&#128233; Correo Electrónico</b>
    <input type="text" class="cajaentradatexto" name="txtcorreo" required>
    <b>&#128198; Fecha de Nacimiento</b>
    <input type="date" class="cajaentradatexto" name="txtfecha" required>
    <b>&#128274; Contraseña</b>
    <input type="password" class="cajaentradatexto" name="txtpas" required>
    <div><b>&#10095; Verificación</b></div>
		
		
        <input type="text" class="cajaentradarecaptcha" id="txtrecaptcha2" required>
		
		<div id="vericodigovai2" onclick="crearrecaptcha2()" class="fondorecaptcha">
	
		</div>
		 
        <button type="submit" class="botonenviar" name="btnregistrarx" id="btnregistrarx" onclick="redireccionarALogin()">Registrar</button>
        </form>
		<!--Formulario para registrar -->
		
        </div>
    </div>
			<script src="js/BotonCambiaFormularios.js"></script>

    <script>
        function redireccionarALogin() {
            window.location.href = 'index.html';
        }
    </script>
</body>
</html