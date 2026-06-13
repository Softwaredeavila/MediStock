<?php
// 1. Identificamos la sesión activa
session_start();

// 2. Limpiamos todas las variables de la sesión (como el ID y el nombre del usuario)
$_SESSION = array();

// 3. Destruimos la sesión por completo en el servidor
session_destroy();

// 4. Redirigimos al usuario de inmediato a la pantalla de login
header("Location: login.php");
exit();
?>