<?php
// 1. Iniciamos la sesión
session_start();

// 2. Incluimos tu archivo de conexión
require_once 'config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $user_input = trim($_POST['usuario']);
    $pass_input = trim($_POST['password']);

    try {
        // 3. Buscamos el usuario en la base de datos
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([':usuario' => $user_input]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // 4. COMPARACIÓN DIRECTA (Sin Hash)
        // Compara el texto que escribiste con lo que está guardado textualmente en la base de datos
        if ($usuario && $pass_input === $usuario['password']) {
            
            // ¡Éxito! Guardamos los datos en la sesión
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre_completo'];
            
            // Redirigimos al Dashboard
            header("Location: dashboard.php");
            exit();
            
        } else {
            // Si la clave o el usuario no coinciden exactamente
            $_SESSION['error_login'] = "Usuario o contraseña incorrectos.";
            header("Location: login.php");
            exit();
        }

    } catch (PDOException $e) {
        $_SESSION['error_login'] = "Error en el sistema: " . $e->getMessage();
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>