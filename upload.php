<?php
session_start();
require("funciones.php");

// Verificar si el usuario está autenticado
/*if(!isset($_SESSION['username'])){
    header("Location: index.html");
    exit;
}*/

//Verificar que el archivo se ha subido sin errores
if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_tmp = $_FILES['file']['tmp_name'];
    if($file_type == "video/mp4"){
        // Verificar si el correo del usuario está definido en la sesión
        if(isset($_SESSION['correo'])) {
            $correo_usuario = $_SESSION['correo'];

            // Generar un nombre único para el archivo de salida
            $output_file = 'output_' . uniqid() . '.mp3';

            // Mover el archivo subido al directorio de destino
            move_uploaded_file($file_tmp, './traducciones/' . $file_name);

            // Comando FFmpeg para convertir el archivo MP4 a MP3
            $ffmpeg_cmd = "ffmpeg -i traducciones/$file_name -vn -acodec libmp3lame -q:a 4 traducciones/$output_file";

            // Ejecutar el comando FFmpeg
            exec($ffmpeg_cmd, $output, $return_code);

            if($return_code === 0){
                // Obtener la fecha actual
                $fecha = date("Y-m-d H:i:s");

                // Establecer conexión con la base de datos
                $conexion = conexion_database();

                // Verificar la conexión
                if (!$conexion) {
                    die("Error en la conexión con la base de datos");
                }

                // Escapar los valores para evitar inyección de SQL
                $correo_usuario = mysqli_real_escape_string($conexion, $correo_usuario);
                $output_file = mysqli_real_escape_string($conexion, $output_file);

                // Crear la consulta SQL para insertar los datos en la tabla
                $sql = "INSERT INTO traducciones (correo_usuario, archivo, fecha) VALUES ('$correo_usuario', '$output_file', '$fecha')";

                // Ejecutar la consulta SQL
                if (mysqli_query($conexion, $sql)) {
                    echo "El video se ha procesado exitosamente y los datos se han guardado en la base de datos. <a href='traducciones/$output_file' download>Descargar MP3</a>";

                    // Eliminar el archivo de entrada después de la descarga
                    echo "<script>window.onload = function() { setTimeout(function() { window.location = 'traducciones/$output_file'; }, 1000); }</script>";
                } else {
                    echo "Error al guardar los datos en la base de datos: " . mysqli_error($conexion);
                }

                // Cerrar la conexión
                mysqli_close($conexion);
            } else {
                echo "Hubo un error al procesar el video.";
            }
        } else {
            echo "Error: El correo del usuario no está definido en la sesión.";
        }
    }
        
}
?>
