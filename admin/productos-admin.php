<?php
include('../db.php'); // Asegúrate de que la ruta sea correcta

// Manejo del formulario de agregar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $categoria_id = $_POST['categoria_id'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Manejo de la carga de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $img_nombre = $_FILES['imagen']['name'];
        $img_temp = $_FILES['imagen']['tmp_name'];
        $img_path = "../img/" . basename($img_nombre); // Cambia esto por el path donde quieras guardar las imágenes

        // Mueve el archivo subido a la carpeta deseada
        if (move_uploaded_file($img_temp, $img_path)) {
            // Inserta el producto en la base de datos
            $stmt = $conn->prepare("INSERT INTO productos (nombre, categoria_id, Precio, imagen, stock) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("siisi", $nombre, $categoria_id, $precio, $img_path, $stock);
            $stmt->execute();
            $stmt->close();
            echo "<script>alert('Producto agregado exitosamente.');</script>"; // Mensaje de éxito
        } else {
            echo "<script>alert('Error al subir la imagen.');</script>";
        }
    } else {
        echo "<script>alert('No se ha subido ninguna imagen.');</script>";
    }
}

// Consultar productos
$result = mysqli_query($conn, "SELECT p.ID, p.nombre, p.categoria_id, p.Precio, p.imagen, p.stock, c.nombre AS categoria_nombre FROM productos p JOIN categorias c ON p.categoria_id = c.ID");

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

// Agrupar productos por categoría
$productos_por_categoria = [];
while ($producto = mysqli_fetch_assoc($result)) {
    $productos_por_categoria[$producto['categoria_nombre']][] = $producto;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentaciones Heladas - Gestión de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #854831;
            color: #f4abba;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .logo {
            max-width: 100px;
        }
        h2 {
            text-align: center;
        }
        .form-container {
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .cajitamm {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 20px;
            margin: 20px auto;
            text-align: center;
            max-width: 1200px;
        }
        .cho {
            border-radius: 18px;
            border: 2px solid #f4abba;
            background-color: #ffffff;
            padding: 20px;
            margin: auto;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #854831;
            color: #f4abba;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .categoria {
            margin-top: 40px;
            border-top: 2px solid #854831;
            padding-top: 20px;
        }
    </style>
</head>
<header>
    <div class="header-left">
        <img class="logo" src="../img/logo.png" alt="logo">
        <h1>TENTACIONES HELADAS</h1>
    </div>
</header>
<body>
    <div class="form-container">
        <h2>Agregar Producto</h2>
        <form action="productos-admin.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nombre" placeholder="Nombre del producto" required>
            <input type="number" name="categoria_id" placeholder="ID de categoría" required>
            <input type="number" name="precio" placeholder="Precio" required>
            <input type="number" name="stock" placeholder="Stock" required>
            <input type="file" name="imagen" accept="image/*">
            <button type="submit">Agregar Producto</button>
        </form>
    </div>

    <h2>Lista de Productos</h2>
    <div class="cajitamm">
        <?php foreach ($productos_por_categoria as $categoria => $productos): ?>
            <div class="categoria">
                <h2><?php echo htmlspecialchars($categoria); ?></h2>
                <?php foreach ($productos as $producto): ?>
                    <div class="cho">
                        <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                        <p>Precio: $<?php echo htmlspecialchars($producto['Precio']); ?></p>
                        <p>Stock: <?php echo htmlspecialchars($producto['stock']); ?></p>
                        <p>
                            <a href="editar_producto.php?id=<?php echo $producto['ID']; ?>">Editar</a>
                            <a href="eliminar_producto.php?id=<?php echo $producto['ID']; ?>">Eliminar</a>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
