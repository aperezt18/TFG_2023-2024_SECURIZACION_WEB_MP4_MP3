<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir y procesar video</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php require("funciones.php"); ?>
    <?php cabezera_traductor(); ?>
    <?php menu_login_ok(); ?>
    <h1>Subir y procesar video</h1>
    <div class="formulario">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="file">Seleccionar archivo MP4:</label><br>
            <input type="file" id="file" name="file" accept="video/mp4"><br><br>
            <input type="submit" value="Subir y procesar">
        </form>
    </div>
    <?php piedepagina(); ?>
</body>
</html>
