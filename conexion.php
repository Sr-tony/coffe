<?php

// Configuración de la conexión a la base de datos
$host = "localhost"; // Cambia esto si tu base de datos está en un servidor diferente
$usuario = "root"; // Cambia esto si tu usuario de MySQL es diferente
$contrasena = ""; // Cambia esto si tu contraseña de MySQL es diferente
$base_datos = "cafeteria"; // Nombre de la base de datos

// Crear la conexión
$_conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($_conexion->connect_error) {
    die("Error de conexión: " . $_conexion->connect_error);
}

?>
