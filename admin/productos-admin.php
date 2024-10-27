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
        .logo { max-width: 80px; }
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
    padding: 20px 0;
    color: #FFFFFF; /* Texto marrón oscuro */
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
    color: #f4abba; /* Color rosa */
    margin-bottom: 10px;
}

.box p, .box a {
    font-size: 1em;
    color: ##FFFFFF; /* Marrón oscuro */
}

.box a {
    text-decoration: none;
    color: #f4abba; /* Enlaces en rosa */
}

.contact-form {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Espacio entre campos */
}

.contact-form label {
    font-size: 1em;
    color: ##FFFFFF; /* Marrón oscuro */
}

.contact-form input, .contact-form textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #ff0099; /* Bordes en rosa */
    border-radius: 8px; /* Bordes redondeados */
    font-size: 1em;
    background-color: #fef5f9; /* Fondo claro */
    color: #5d4037; /* Texto marrón oscuro */
}

.contact-form input:focus, .contact-form textarea:focus {
    outline: none;
    border-color: #a65380; /* Cambio de color al enfocar */
}

.contact-form button {
    background-color: #ff0099; /* Fondo del botón rosa */
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.1em;
    transition: background-color 0.3s ease;
}

.contact-form button:hover {
    background-color: #a65380; /* Rosa oscuro al pasar el mouse */
}

.grupo-2 {
    text-align: center;
    margin-top: 20px;
    background-color: #f4abba; /* Fondo marrón oscuro */
    color: black;
    padding: 10px 0;
}

.grupo-2 small {
    font-size: 0.9em;
}


        /* Estilos del formulario de contacto */
        .formulario-contacto {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .formulario-contacto input,
        .formulario-contacto textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        @media screen and (max-width:800px) {
            .pie-pagina .grupo-1 {
                width: 90%;
                grid-template-columns: repeat(1, 1fr);
                grid-gap: 30px;
                padding: 35px 0px;
            }
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
    <div class="grupo-1">
        <div class="box">
            <h2>Calidad del Producto</h2>
            <p>En Tentaciones Heladas, nos dedicamos a ofrecerte helados artesanales de la más alta calidad. <br><br>
                Utilizamos ingredientes frescos y naturales, seleccionados cuidadosamente para garantizar que 
                cada bocado sea una experiencia deliciosa y satisfactoria. <br> <br>¡Déjate llevar por la 
                frescura y la calidad que solo Tentaciones Heladas puede ofrecer!</p>
        </div>
        <div class="box">
            <h2>Contacto</h2>
            <p>Teléfono: 123-456-7890</p>
            <p>Email: @tentacionesheladass.gmail.com</p>
            <a href="https://www.instagram.com/tentacionesheladass/?hl=es">Instagram</a>
        </div>
        <div class="box">
            <h2>Contáctanos</h2>
            <form action="guardar_contacto.php" method="POST" class="contact-form">
                <label for="nombre">Nombre </label>
                <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre">

                <label for="email">Email </label>
                <input type="email" id="email" name="email" required placeholder="Tu email">

                <label for="mensaje">Mensaje </label>
                <textarea id="mensaje" name="mensaje" required placeholder="Tu mensaje"></textarea>

                <button type="submit">ENVIAR</button>
            </form>
        </div>
    </div>
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
