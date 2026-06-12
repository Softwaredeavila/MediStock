<?php
// 1. Iniciamos la sesión para poder recordar al usuario en todo el sistema
session_start();

// 2. Incluimos tu archivo de conexión a MySQL
require_once 'config/conexion.php';

// 3. Verificamos que los datos hayan sido enviados por el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Capturamos y limpiamos espacios en blanco de los datos del formulario
    $user_input = trim($_POST['usuario']);
    $pass_input = trim($_POST['password']);

    try {
        // 4. Preparamos la consulta SQL para buscar al usuario de forma segura (Evita Inyección SQL)
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([':usuario' => $user_input]);
        
        // Obtenemos el resultado en un arreglo asociativo
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // 5. Validamos si el usuario existe y si la contraseña coincide con el Hash
        if ($usuario && password_verify($pass_input, $usuario['password'])) {
            
            // ¡ÉXITO! Guardamos los datos clave en la sesión del servidor
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre_completo'];
            
            // Redirigimos directo al Dashboard
            header("Location: dashboard.php");
            exit();
            
        } else {
            // ERROR: Si no coincide el usuario o la clave, guardamos el mensaje en la sesión
            $_SESSION['error_login'] = "Usuario o contraseña incorrectos.";
            
            // Devolvemos al usuario a la pantalla de login para que lo intente de nuevo
            header("Location: login.php");
            exit();
        }

    } catch (PDOException $e) {
        // En caso de un fallo técnico con la base de datos durante la consulta
        $_SESSION['error_login'] = "Error en el sistema. Por favor, intente más tarde.";
        header("Location: login.php");
        exit();
    }
} else {
    // Si alguien intenta entrar a este archivo escribiendo la URL directamente, lo expulsamos al login
    header("Location: login.php");
    exit();
}
?>