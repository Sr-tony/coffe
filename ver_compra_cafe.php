<?php include('encabezado.php'); ?>
<?php
// Incluir el archivo de conexión a la base de datos
require_once("conexion.php");

// Realizar una consulta SQL para obtener todos los registros de compras de café
$sql = "SELECT id, fecha_compra, descripcion, cantidad, proveedor, precio FROM compras_cafe";

// Ejecutar la consulta
$resultado = $_conexion->query($sql);

// Verificar si hay filas de resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en una tabla HTML
    echo "<h2>Registros de Compras de Café</h2>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Fecha de Compra</th>
    <th>Descripción</th>
    <th>Cantidad (kg)</th>
    <th>Proveedor</th>
    <th>Precio Total</th>
    </tr>";
    // Recorrer cada fila de resultados
    while($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["fecha_compra"] . "</td>";
        echo "<td>" . $fila["descripcion"] . "</td>";
        echo "<td>" . $fila["cantidad"] . "</td>";
        echo "<td>" . $fila["proveedor"] . "</td>";
        echo "<td>" . $fila["precio"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros de compras de café.";
}

// Cerrar la conexión a la base de datos
$_conexion->close();
?>
