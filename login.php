<?php
// Incluir el archivo de conexión a la base de datos
require_once("conexion.php");

// Inicializar variables de sesión
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    // Realizar una consulta SQL para obtener el usuario con el email proporcionado
    $sql = "SELECT id, nombre, email, contrasena FROM usuarios WHERE email = ?";
    
    // Preparar la declaración
    $stmt = $_conexion->prepare($sql);
    
    // Vincular los parámetros
    $stmt->bind_param("s", $email);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener el resultado de la consulta
    $resultado = $stmt->get_result();
    
    // Verificar si se encontró un usuario con el email proporcionado
    if ($resultado->num_rows == 1) {
        // Obtener los datos del usuario
        $usuario = $resultado->fetch_assoc();
        
        // Verificar si la contraseña ingresada coincide con la contraseña almacenada en la base de datos
        if (password_verify($contrasena, $usuario["contrasena"])) {
            // Iniciar sesión y almacenar información del usuario en variables de sesión
            $_SESSION["id"] = $usuario["id"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["email"] = $usuario["email"];
            
            // Redireccionar a la página de ventas
            header("Location: venta.php");
            exit();
        } else {
            // Contraseña incorrecta
            $error = "La contraseña es incorrecta.";
        }
    } else {
        // Usuario no encontrado
        $error = "No se encontró ningún usuario con el email proporcionado.";
    }
    
    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión a la base de datos
$_conexion->close();
?>
