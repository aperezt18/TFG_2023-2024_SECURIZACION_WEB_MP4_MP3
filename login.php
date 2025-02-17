<?php
session_start();
require("funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasenya = $_POST["contrasenya"];

    $login_exitoso = login_database($correo, $contrasenya);

    if ($login_exitoso) {
        // Establecer el correo del usuario en la sesión
        $_SESSION['correo'] = $correo;
        
        // Redirigir al usuario después del inicio de sesión exitoso
        header("Location: inicio_sesion_exitoso.php");
        exit;
    } else {
        $error_message = "Correo electrónico o contraseña incorrectos. Por favor, inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php cabezera_traductor(); ?>
    <?php menu_no_login(); ?>
    <h1>Iniciar sesión</h1>
    <?php if (isset($error_message)) {
        echo "<p>$error_message</p>";
    } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="correo">Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>
        <label for="contrasenya">Contraseña:</label><br>
        <input type="password" id="contrasenya" name="contrasenya" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <?php piedepagina(); ?>
</body>
</html>
