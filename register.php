<?php
require("funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $contrasenya = $_POST["contrasenya"];

    if (ifuserexists($correo)) {
        $error_message = "No pueden haber dos usuarios con el mismo correo, inténtelo de nuevo";
    } else {
        $resultado = registrar_usuario($nombre, $apellidos, $correo, $contrasenya);

        if ($resultado) {
            // Redirigir al usuario después del registro exitoso
            header("Location: registro_exitoso.php");
            exit;
        } else {
            $error_message = "Hubo un error durante el registro. Por favor, inténtalo de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear cuenta</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php cabezera_traductor(); ?>
    <?php menu_no_login(); ?>
    <h1>Crear cuenta</h1>
    <?php if (isset($error_message)) {
        echo "<p>$error_message</p>";
    } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br><br>
        <label for="correo">Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>
        <label for="contrasenya">Contraseña:</label><br>
        <input type="password" id="contrasenya" name="contrasenya" required><br><br>
        <input type="submit" value="Registrarse">
    </form>
    <?php piedepagina(); ?>
</body>
</html>
