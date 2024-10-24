<?php
include('../db.php'); // Asegúrate de que la ruta sea correcta

// Manejo del formulario de agregar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $categoria_id = $_POST['categoria_id'];
    $precio = $_POST['precio'];

    // Manejo de la carga de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $img_nombre = $_FILES['imagen']['name'];
        $img_temp = $_FILES['imagen']['tmp_name'];
        $img_path = "../img/" . basename($img_nombre); // Cambia esto por el path donde quieras guardar las imágenes

        // Mueve el archivo subido a la carpeta deseada
        if (move_uploaded_file($img_temp, $img_path)) {
            // Inserta el producto en la base de datos
            $stmt = $conn->prepare("INSERT INTO productos (nombre, categoria_id, Precio, imagen) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("siis", $nombre, $categoria_id, $precio, $img_nombre); // Guardar solo el nombre de la imagen
            if ($stmt->execute()) {
                // Obtener el nombre de la categoría
                $categoria_stmt = $conn->prepare("SELECT nombre FROM categorias WHERE id = ?");
                $categoria_stmt->bind_param("i", $categoria_id);
                $categoria_stmt->execute();
                $categoria_stmt->bind_result($nombre_categoria);
                $categoria_stmt->fetch();
                $categoria_stmt->close();

                echo "<div class='message'>Producto '$nombre' agregado exitosamente en la categoría '$nombre_categoria'.</div>";
            } else {
                echo "<div class='error'>Error al agregar el producto: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } else {
            echo "<div class='error'>Error al subir la imagen.</div>";
        }
    } else {
        echo "<div class='error'>No se ha subido ninguna imagen.</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"] {
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
        .message, .error {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            width: 90%;
            max-width: 400px;
            margin: 20px auto;
            font-weight: bold;
        }
        .message {
            background-color: #d4edda; /* Verde claro para éxito */
            color: #155724; /* Texto verde oscuro */
        }
        .error {
            background-color: #f8d7da; /* Rojo claro para errores */
            color: #721c24; /* Texto rojo oscuro */
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
        <h2>Agregar Producto</h2>
        <form action="agregar_producto.php" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="categoria_id">Categoría:</label>
            <input type="number" id="categoria_id" name="categoria_id" required>
            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" required>
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" required>
            <input type="submit" value="Agregar Producto">
        </form>
        <a class="back-link" href="index-admin.php">Regresar a la gestión de productos</a>
    </div>
</body>
</html>


