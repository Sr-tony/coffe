<?php include('encabezado.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Producto</title>
</head>
<body>
    <h2>Registro de Producto</h2>
    <form method="post" action="registrar_producto.php">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br>
        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="precio" step="0.01" required><br>
        <label for="imagen">Imagen (URL):</label><br>
        <input type="text" id="imagen" name="imagen" required><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>