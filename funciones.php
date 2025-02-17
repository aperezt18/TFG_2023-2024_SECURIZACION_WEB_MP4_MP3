<?php


function cabezera_traductor(){
  echo "<DOCTYPE html>
  <html lang=\"es\">
      <head>
        <meta charset=\"utf-8\">
        <title>Netkim</title>
        <link rel=\"stylesheet\" href=\"estilos.css\">
        <link href=\"{{ url_for(\"static\", filename=\"estilos.css\") }}\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
      </head>
  <body>
  <header>  
    <div id=\"titulo\">
      <h1>Netkim</h1>
    </div>
  </header>";
}


function menu_no_login(){
    echo " <div id=\"menu\">
    <div id=\"divlogo\">
        <br><img id=\"logo\" src=\"lock.png\">
    </div>

    <br><br><a href=\"login.php\">Loguearse</a><br><br><br>

    <a href=\"index.php\">Volver al inicio</a>
  </div>";
}

function menu_login_ok(){
  echo " <div id=\"menu\">
  <div id=\"divlogo\">
  <br><img id=\"logo\" src=\"bombilla.png\">
  </div>

    <br><br><a href=\"traductor.php\">Ir al traductor</a><br><br><br>

    <a href=\"logout.php\">Cerrar sesión</a><br>

</div>";
}

function piedepagina(){
  echo "<footer><div><strong>Aviso de Derechos de Autor: </strong></div>";
  echo "<div>Todos los contenidos de esta página web están protegidos por derechos de autor.</div>";
  echo "<div>Queda prohibida su reproducción sin autorización previa por escrito.</div>";
  echo "<div>Gracias. NetKim</div>";
  echo "</footer></body></html>";
}

function login_database($correo, $contrasenya){
  $server="localhost";
  $user="root";
  $password="";
  $database="p1";
  
  // Establecer la conexión a la base de datos
  $conexion = mysqli_connect($server, $user, $password, $database);
  if (!$conexion) {
      return false;
  }

  // Escapar las entradas para evitar la inyección SQL
  $correo = mysqli_real_escape_string($conexion, $correo);
  $contrasenyahasheada = hash("md5", $contrasenya);

  // Consulta SQL para verificar las credenciales del usuario
  $sql= "SELECT COUNT(*) FROM usuarios WHERE correo = '$correo' AND contrasenya = '$contrasenyahasheada'";
  $result = mysqli_query($conexion, $sql);

  // Verificar si la consulta fue exitosa y si el usuario existe
  if ($result && mysqli_num_rows($result) == 1) {
      // Crear entrada en la tabla historial_logins
      $current_time = date("Y-m-d H:i:s");
      $ip = conseguirIp();
      $login_exitoso = 1; // 1 para éxito
      $sql_log = "INSERT INTO historial_logins (usuario, fecha, ip, login_exitoso) VALUES ('$correo', '$current_time', '$ip', $login_exitoso)";
      mysqli_query($conexion, $sql_log);

      // Iniciar sesión y establecer el correo del usuario en la sesión
      session_start();
      $_SESSION["correo"] = $correo;

      // Cerrar la conexión y devolver verdadero
      mysqli_close($conexion);
      return true;
  } else {
      // Cerrar la conexión y devolver falso
      mysqli_close($conexion);
      return false;
  }
}


function conexion_database(){
  $server="localhost";
  $user="root";
  $password="";
  $database="p1";
  $conexion = mysqli_connect($server, $user, $password);
  if (!$conexion) {
    return false;
  } else {
    mysqli_select_db($conexion, $database);
    return $conexion;
  }
}

function conseguirIp() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

function registrar_usuario($nombre, $apellidos, $correo, $contrasenya) {
  $conexion = conexion_database();
  if (!$conexion) {
      return false;
  }
  
  $contrasenya_hasheada = hash("md5", $contrasenya);

  // Usar consulta preparada para evitar inyección SQL
  $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, correo, contrasenya) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $nombre, $apellidos, $correo, $contrasenya_hasheada);
  $result = $stmt->execute();

  $stmt->close();
  mysqli_close($conexion);

  return $result;
}

function ifuserexists($correo) {
  $conexion = conexion_database();
  if (!$conexion) {
      return false;
  }
  
  // Usar consulta preparada para evitar inyección SQL
  $stmt = $conexion->prepare("SELECT correo FROM usuarios WHERE correo = ?");
  $stmt->bind_param("s", $correo);
  $stmt->execute();
  $stmt->store_result();

  $user_exists = $stmt->num_rows > 0;

  $stmt->close();
  mysqli_close($conexion);

  return $user_exists;
}


?>