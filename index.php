<?php
require("funciones.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a Netkim</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php cabezera_traductor(); ?>
    <?php menu_no_login(); ?>
    <div class="div_index">
        <h1>Bienvenido al servidor de conversión Netkim</h1>
        <p>Inicia sesión y crea tus archivos MP3. Si no tienes una cuenta, <a href="register.php">crea una aquí</a>.</p>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>.</p>
    </div>
    <?php piedepagina(); ?>
</body>
</html>