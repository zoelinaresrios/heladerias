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
            $stmt->bind_param("siisi", $nombre, $categoria_id, $precio, $img_nombre, $stock);
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

$result = mysqli_query($conn, "SELECT p.ID, p.nombre, p.categoria_id, p.Precio, p.imagen, p.stock, c.nombre AS categoria_nombre FROM productos p JOIN categorias c ON p.categoria_id = c.ID");

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

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
         body { font-family: Arial, sans-serif; background-color: #f4abba; color: #854831; margin: 0; padding: 0; }
        .logo { max-width: 130px; }
        header { background-color: #854831; color: #f4abba; padding: 10px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; }
        .header-left { display: flex; align-items: center; }
        .header-left h1 { margin-left: 10px; font-size: 24px; }
        .search-container { flex: 1; display: flex; justify-content: center; margin: 10px 0; position: relative; }
        
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        .form-container {
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .cajitamm {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px auto;
            max-width: 1200px;
        }
        .categoria {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 40px;
            border-top: 2px solid #854831;
            padding-top: 20px;
            width: 100%;
        }
        .productos-row {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .cho {
            border-radius: 18px;
            border: 2px solid #f4abba;
            background-color: #ffffff;
            padding: 20px;
            margin: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 200px; /* Tamaño fijo para que todos los productos tengan el mismo tamaño */
            transition: transform 0.2s; /* Efecto de hover */
        }
        .cho img {
            max-width: 100%;
            height: 150px; /* Altura fija para las imágenes */
            border-radius: 10px;
            object-fit: cover; /* Asegura que la imagen mantenga su proporción */
        }
        .cho:hover {
            transform: scale(1.05); /* Efecto de hover para aumentar el tamaño */
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
    
        .search-container { flex: 1; display: flex; justify-content: center; margin: 10px 0; position: relative; }
        input[type="search"] { 
            border: 2px solid #e6007f; 
            border-radius: 20px; 
            padding: 8px 40px 8px 15px; 
            outline: none; 
            color: #333; 
            width: 100%; 
            max-width: 500px; 
            transition: border-color 0.3s ease;
        }
        input[type="search"]:focus { border-color: #d5006d; }
        .search-btn { 
            background-color: transparent; 
            border: none; 
            cursor: pointer; 
            margin-left: 10px; 
            transition: transform 0.2s; 
        }
        .search-btn:hover { transform: scale(1.1); }
        .home-button { 
            background-color: #e6007f; 
            border: none; 
            border-radius: 5px; 
            padding: 10px 15px; 
            color: white; 
            cursor: pointer; 
            margin-right: 10px; 
        }
        .home-button { 
            background-color: #e6007f; 
            border: none; 
            border-radius: 5px; 
            padding: 10px 15px; 
            color: white; 
            cursor: pointer; 
            margin-right: 10px; 
        }
        .pie-pagina {
    background-color: #854831; /* Fondo en tono marrón claro */
    padding: 0%;
    color: #FFFFFF; /* Texto marrón oscuro */
}

.grupo-2 {
    text-align: center;
    margin-top: 20px;
    background-color: #854831; /* Fondo marrón oscuro */
    color: black;
    padding: 10px 0;
}   .grande{
    font-size:25px;
}
  

.grupo-2 small {
    font-size: 0.9em;
}
    </style>
</head>
<header>
        <div class="header-left">
            <img class="logo" src="../img/logo.png" alt="logo">
            <h1>TENTACIONES HELADAS</h1>
        </div>
        <div class="search-container">
            <input type="search" id="searchInput" placeholder="Buscar productos...">
            <button class="search-btn" onclick="scrollToProduct()">
                <img src="../img/lupa.webp" alt="Buscar" style="width: 24px; height: 24px;">
            </button>
        </div>
        <button class="home-button" onclick="location.href='index-admin.php'">Inicio</button>
    </header>
    
<body>

    <h2>Lista de Productos</h2>
    <div class="cajitamm">
        <?php foreach ($productos_por_categoria as $categoria => $productos): ?>
            <div class="categoria">
                <h2><?php echo htmlspecialchars($categoria); ?></h2>
                <div class="productos-row">
                    <?php foreach ($productos as $producto): ?>
                        <div class="cho">
                            <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                            <img src="../img/<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                            <p>Precio: $<?php echo htmlspecialchars($producto['Precio']); ?></p>
                            <p>Stock: <?php echo htmlspecialchars($producto['stock']); ?></p>
                            <p>
                                <a href="editar_producto.php?id=<?php echo $producto['ID']; ?>" class="button">Editar</a>
                                <a href="eliminar_producto.php?id=<?php echo $producto['ID']; ?>" class="button">Eliminar</a>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
<footer class="pie-pagina">
    <div class="grupo-2">
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
</footer>
    

    <script>
        function scrollToProduct() {
            const input = document.getElementById('searchInput');
            const searchTerm = input.value.toLowerCase();
            const productos = document.querySelectorAll('h2');
            let found = false;

            productos.forEach(producto => {
                if (producto.textContent.toLowerCase().includes(searchTerm)) {
                    producto.scrollIntoView({ behavior: 'smooth' });
                    found = true;
                }
            });

            if (!found) {
                alert('No se encontraron productos que coincidan con "' + searchTerm + '"');
            }
        }
        
        function searchProduct(productId) {
            alert('Buscando el producto con ID: ' + productId);
            // Aquí puedes agregar la lógica para buscar el producto específico
        }
    </script>
</body>
</html>
