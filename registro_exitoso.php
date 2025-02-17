<?php
require("funciones.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro exitoso</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php cabezera_traductor(); ?>
    <?php menu_no_login(); ?>
    <h1>Registro exitoso</h1>
    <div class="div_index">
    <p>Tu cuenta ha sido creada exitosamente. Ahora puedes <a href="login.php">iniciar sesión</a> para comenzar a utilizar nuestro servicio.</p>
    </div>
    <?php piedepagina(); ?>
</body>
</html>
