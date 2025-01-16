<?php include('encabezado.php'); ?>
<?php
// Incluir el archivo de conexión a la base de datos
require_once("conexion.php");

// Realizar una consulta SQL para obtener todos los productos
$sql = "SELECT * FROM productos";

// Ejecutar la consulta
$resultado = $_conexion->query($sql);

// Verificar si hay filas de resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en una tabla HTML
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Precio</th>
    <th>Imagen</th>
    </tr>";
    // Recorrer cada fila de resultados
    while($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["descripcion"] . "</td>";
        echo "<td>" . $fila["precio"] . "</td>";
        echo "<td><img src='" . $fila["imagen"] . "' alt='" . $fila["nombre"] . "' height='100'></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron productos.";
}

// Cerrar la conexión a la base de datos
$_conexion->close();
?>