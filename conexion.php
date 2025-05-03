<?php
$host = "localhost";
$usuario = "root";
$contrasena = ""; // Si usas XAMPP o Laragon, normalmente está vacío
$basededatos = "hamburguesas_db";

$conexion = new mysqli($host, $usuario, $contrasena, $basededatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
