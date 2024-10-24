<?php
include('../db.php'); // Asegúrate de que la ruta sea correcta

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consultar el producto
    $result = mysqli_query($conn, "SELECT * FROM productos WHERE ID = $id");
    $producto = mysqli_fetch_assoc($result);

    // Manejo del formulario de edición
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $categoria_id = $_POST['categoria_id'];
        $precio = $_POST['precio'];
        
        // Actualiza el producto en la base de datos
        $stmt = $conn->prepare("UPDATE productos SET nombre = ?, categoria_id = ?, Precio = ? WHERE ID = ?");
        $stmt->bind_param("sidi", $nombre, $categoria_id, $precio, $id);
        $stmt->execute();
        $stmt->close();
        echo "Producto actualizado exitosamente.";
    }
} else {
    echo "ID de producto no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #854831;
            color: #f4abba;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #703c2e; /* Un tono más oscuro al pasar el mouse */
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Editar Producto</h2>
        <form action="editar_producto.php?id=<?php echo $id; ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
            <label for="categoria_id">Categoría:</label>
            <input type="number" id="categoria_id" name="categoria_id" value="<?php echo htmlspecialchars($producto['categoria_id']); ?>" required>
            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" value="<?php echo htmlspecialchars($producto['Precio']); ?>" required>
            <input type="submit" value="Actualizar">
        </form>
        <a class="back-link" href="index-admin.php">Regresar a la gestión de productos</a>
    </div>
</body>
</html>
