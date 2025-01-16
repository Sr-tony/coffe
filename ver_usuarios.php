<?php include('encabezado.php'); ?>
<?php
// Incluir el archivo de conexión a la base de datos
require_once("conexion.php");

// Realizar una consulta SQL para obtener todos los usuarios
$sql = "SELECT id, nombre, email FROM usuarios";

// Ejecutar la consulta
$resultado = $_conexion->query($sql);

// Verificar si hay filas de resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en una tabla HTML
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Email</th>
    </tr>";
    // Recorrer cada fila de resultados
    while($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron usuarios.";
}

// Cerrar la conexión a la base de datos
$_conexion->close();
?>
