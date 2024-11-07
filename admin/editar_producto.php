<?php
include('../db.php'); // Asegúrate de que la ruta sea correcta

$mensaje_exito = ""; // Variable para almacenar el mensaje de éxito

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
        $stock = $_POST['stock']; // Agregar la variable stock
        
        // Actualiza el producto en la base de datos
        $stmt = $conn->prepare("UPDATE productos SET nombre = ?, categoria_id = ?, Precio = ?, stock = ? WHERE ID = ?");
        $stmt->bind_param("sidii", $nombre, $categoria_id, $precio, $stock, $id); // Añadir stock a la lista de parámetros
        $stmt->execute();
        $stmt->close();
        
        // Mensaje de éxito
        $mensaje_exito = "Producto actualizado exitosamente.";
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
        .mensaje-exito {
            max-width: 600px;
            margin: 20px auto;
            padding: 15px;
            background-color: #854831;
            color: #f4abba;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
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
            background-color: #703c2e;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
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
            flex: 1;
        }
        .logo {
            max-width: 10%;
        }
        .header-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 100%;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 10px;
        }
        .nav-links a {
            color: #f4abba;
            text-decoration: none;
            padding: 5px;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        .pie-pagina {
            background-color: #854831;
            padding: 0%;
            color: #FFFFFF;
        }
        .grupo-1 {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
            padding-right: 50px;
            font-size:15px;
        }
        .box {
            width: 30%;
            text-align: left;
            padding-left: 70px;
        }
        .box h2 {
            font-size: 1.5em;
            color: #f4abba;
            margin-bottom: 10px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ff0099;
            border-radius: 8px;
            font-size: 1em;
            background-color: #fef5f9;
            color: #5d4037;
        }
        .contact-form button {
            background-color: #ff0099;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
            width: 105%;
        }
        .contact-form button:hover {
            background-color: #a65380;
        }
        .grupo-2 {
            text-align: center;
            margin-top: 9.9%;
            background-color: #f4abba;
            color: black;
            padding: 10px 0;
        }
        .grupo-2 small {
            font-size: 0.9em;
        }
        .pie-pagina {
            background-color: #854831;
            padding: 0%;
            color: #FFFFFF;
        }
        .grande{
    font-size:25px;
}
    </style>
</head>
<body>
<header>
    <div class="header-left">
        <img class="logo" src="../img/logo.png" alt="logo">
        <div class="header-info">
            <h1>TENTACIONES HELADAS</h1>
            <div class="nav-links">
                <a class="grande" href="index-admin.php">Inicio</a>
            </div>
        </div>
    </div>
</header>

<div class="form-container">
    <h2>Editar Producto</h2>
    
    <?php if (!empty($mensaje_exito)) : ?>
        <div class="mensaje-exito"><?php echo $mensaje_exito; ?></div>
    <?php endif; ?>

    <form action="editar_producto.php?id=<?php echo $id; ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
        
        <label for="categoria_id">Categoría:</label>
        <input type="number" id="categoria_id" name="categoria_id" value="<?php echo htmlspecialchars($producto['categoria_id']); ?>" required>
        
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" value="<?php echo htmlspecialchars($producto['Precio']); ?>" required>
        
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="<?php echo htmlspecialchars($producto['stock']); ?>" required>
        
        <input type="submit" value="Actualizar">
    </form>
    <a class="back-link" href="productos-admin.php">Regresar a la gestión de productos</a>
</div>
                <footer class="pie-pagina">
    <div class="grupo-2">
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
</footer>

</body>
</html>
