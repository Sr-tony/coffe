<?php include('encabezado.php'); ?>
<?php
// Incluir el archivo de conexión a la base de datos
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado los datos del formulario
    if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_POST["imagen"])) {
        // Recoger los datos del formulario
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $imagen = $_POST["imagen"];

        // Preparar la consulta SQL para insertar el producto
        $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)";

        // Preparar la declaración
        $stmt = $_conexion->prepare($sql);

        // Vincular los parámetros
        $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $imagen);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Producto registrado exitosamente";
        } else {
            echo "Error al registrar el producto: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Por favor, complete todos los campos del formulario";
    }
} else {
    echo "Acceso denegado";
}

// Cerrar la conexión a la base de datos
$_conexion->close();
?>
<form action="producto.php" method="get">
    <button type="submit">Okey</button>
</form>