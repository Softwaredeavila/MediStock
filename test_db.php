<?php

require_once 'config/conexion.php';

echo "<h2>Probando conexión a la Base de Datos...</h2>";

try {
    
    if (isset($conexion)) {
        
        // Ejecutamos una consulta de prueba (saber la versión de MySQL)
        $stmt = $conexion->query("SELECT VERSION() AS version");
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo "<p style='color: green; font-weight: bold;'>¡Conexión exitosa!</p>";
        echo "<p>Versión de MySQL: " . $resultado['version'] . "</p>";
        echo "<p>La base de datos 'Citas' está lista para usarse.</p>";
    } else {
        echo "<p style='color: red;'>La variable \$conexion no está definida. Verifica tu archivo conexion.php</p>";
    }
} catch (PDOException $e) {
    echo "<p style='color: red; font-weight: bold;'>Error al consultar la base de datos:</p>";
    echo "" . $e->getMessage();
}
?>