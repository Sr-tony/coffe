<?php include('encabezado.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Compra de Café</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Registrar Compra de Café</h2>
    <form method="post" action="registrar_compra.php">
        <label for="fecha">Fecha de compra:</label><br>
        <input type="date" id="fecha" name="fecha" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" required></textarea><br>
        <label for="cantidad">Cantidad (en kilogramos):</label><br>
        <input type="number" id="cantidad" name="cantidad" step="0.01" required><br>
        <label for="proveedor">Proveedor:</label><br>
        <input type="text" id="proveedor" name="proveedor" required><br>
        <label for="precio">Precio total:</label><br>
        <input type="number" id="precio" name="precio" step="0.01" required><br>
        <input type="submit" value="Registrar Compra">
    </form>
</body>
</html>
