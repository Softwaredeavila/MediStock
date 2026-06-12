<?php
$host = "localhost";
$db_name = "citas";
$username = "root";
$password = "0811"; 

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>