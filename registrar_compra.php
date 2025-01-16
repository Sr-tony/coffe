<?php include('encabezado.php'); ?>
<?php
// Incluir el archivo de conexión a la base de datos
require_once("conexion.php");

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $fecha = $_POST["fecha"];
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];
    $proveedor = $_POST["proveedor"];
    $precio = $_POST["precio"];

    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO compras_cafe (fecha_compra, descripcion, cantidad, proveedor, precio) VALUES (?, ?, ?, ?, ?)";
    
    // Preparar la declaración
    $stmt = $_conexion->prepare($sql);
    
    // Vincular los parámetros
    $stmt->bind_param("ssdss", $fecha, $descripcion, $cantidad, $proveedor, $precio);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "La compra de café se ha registrado exitosamente.";
    } else {
        echo "Error al registrar la compra de café: " . $stmt->error;
    }
    
    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión a la base de datos
$_conexion->close();
?>
<form action="compra_cafe.php" method="get">
    <button type="submit">Okey</button>
</form>