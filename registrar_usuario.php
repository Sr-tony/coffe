<?php include('encabezado.php'); ?>
<?php
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["contrasena"])) {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];

        // Encriptar la contraseña
        $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)";

        // Preparar la declaración
        $stmt = $_conexion->prepare($sql);

        // Vincular los parámetros
        $stmt->bind_param("sss", $nombre, $email, $contrasena_encriptada);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Usuario registrado exitosamente";
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Por favor, complete todos los campos del formulario";
    }
} else {
    echo "Acceso denegado";
}
?>
<form action="usuario.php" method="get">
    <button type="submit">Okey</button>
</form>