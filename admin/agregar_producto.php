<?php
include('../db.php'); // Asegúrate de que la ruta sea correcta
$mensaje = ''; // Variable para almacenar el mensaje

// Manejo del formulario de agregar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $categoria_id = $_POST['categoria_id'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock']; // Agregamos la variable para el stock

    // Manejo de la carga de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $img_nombre = $_FILES['imagen']['name'];
        $img_temp = $_FILES['imagen']['tmp_name'];
        $img_path = "../img/" . basename($img_nombre);

        // Mueve el archivo subido a la carpeta deseada
        if (move_uploaded_file($img_temp, $img_path)) {
            // Inserta el producto en la base de datos
            $stmt = $conn->prepare("INSERT INTO productos (nombre, categoria_id, Precio, imagen, stock) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("siisi", $nombre, $categoria_id, $precio, $img_nombre, $stock);

            if ($stmt->execute()) {
                $categoria_stmt = $conn->prepare("SELECT nombre FROM categorias WHERE id = ?");
                $categoria_stmt->bind_param("i", $categoria_id);
                $categoria_stmt->execute();
                $categoria_stmt->bind_result($nombre_categoria);
                $categoria_stmt->fetch();
                $categoria_stmt->close();

                $mensaje = "Producto '$nombre' agregado exitosamente en la categoría '$nombre_categoria'.";
            } else {
                $mensaje = "Error al agregar el producto: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $mensaje = "Error al subir la imagen.";
        }
    } else {
        $mensaje = "No se ha subido ninguna imagen.";
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
        /* Estilos del formulario y cartel */
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
        h2 { text-align: center; }
        label { display: block; margin-bottom: 8px; }
        input[type="text"], input[type="number"], input[type="file"] {
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

        /* Estilos del cartel de mensaje */
        .cartel-mensaje {
            display: none; /* Oculto por defecto */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .mensaje-contenido {
            background-color: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            text-align: center;
        }
        .btn-ok {
            background-color: #854831;
            color: #f4abba;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 10px;
        }
        
        /* Estilos del header y footer */
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
        .header-info h1 {
            margin: 0;
            font-size: 24px;
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
        .grupo-2 {
    text-align: center;
    margin-top: 5.6%;
    background-color: #f4abba; /* Fondo marrón oscuro */
    color: black;
    padding: 10px 0;
}
        .grupo-2 small {
    font-size: 0.9em;
}
        .grande{
    font-size:25px;
}
    </style>
    <script>
        // Mostrar y ocultar el cartel de mensaje
        function mostrarCartel() {
            document.getElementById('cartel-mensaje').style.display = 'flex';
        }
        function ocultarCartel() {
            document.getElementById('cartel-mensaje').style.display = 'none';
        }
    </script>
</head>
<body onload="<?php if (!empty($mensaje)) echo 'mostrarCartel();'; ?>">

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
    <h2>Agregar Producto</h2>
    <form action="agregar_producto.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="categoria_id">Categoría:</label>
        <input type="number" id="categoria_id" name="categoria_id" required>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" required>
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required min="0">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" required>
        <input type="submit" value="Agregar Producto">
    </form>
</div>

<!-- Cartel de mensaje -->
<div id="cartel-mensaje" class="cartel-mensaje">
    <div class="mensaje-contenido">
        <?php if (!empty($mensaje)) echo htmlspecialchars($mensaje); ?>
        <button class="btn-ok" onclick="ocultarCartel()">OK</button>
    </div>
</div>

<footer class="pie-pagina">
    <div class="grupo-2">
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
</footer>

</body>
</html>