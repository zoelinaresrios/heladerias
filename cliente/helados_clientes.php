<?php
session_start();
include '../db.php';

// Verifica si hay un mensaje de stock insuficiente y almacénalo en una variable JavaScript
if (isset($_SESSION['mensaje_stock'])) {
    echo "<script>alert('{$_SESSION['mensaje_stock']}');</script>";
    unset($_SESSION['mensaje_stock']);
}

// Consulta para obtener las categorías y sus productos
$query = "SELECT c.ID AS categoria_id, c.nombre AS categoria_nombre, p.ID AS producto_id, p.nombre AS producto_nombre, p.precio, p.imagen 
          FROM categorias c 
          LEFT JOIN productos p ON c.ID = p.categoria_id 
          ORDER BY c.ID, p.ID"; 
$result = $conn->query($query);

$categorias = [];
while ($row = $result->fetch_assoc()) {
    $categoria_id = $row['categoria_id'];
    $categoria_nombre = htmlspecialchars($row['categoria_nombre']);
    $producto_id = $row['producto_id'];
    $producto_nombre = htmlspecialchars($row['producto_nombre']);
    $producto_precio = htmlspecialchars($row['precio']);
    $producto_imagen = htmlspecialchars($row['imagen']);

    // Organiza los productos por categoría
    if (!isset($categorias[$categoria_id])) {
        $categorias[$categoria_id] = [
            'nombre' => $categoria_nombre,
            'productos' => []
        ];
    }
    if ($producto_id) {
        $categorias[$categoria_id]['productos'][] = [
            'id' => $producto_id,
            'nombre' => $producto_nombre,
            'precio' => $producto_precio,
            'imagen' => $producto_imagen
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentaciones Heladas</title>
    <style>
        /* Tus estilos CSS aquí */
        body { font-family: Arial, sans-serif; background-color: #f4abba; color: #854831; margin: 0; padding: 0; }
        .logo { max-width: 130px; }
        header { background-color: #854831; color: #f4abba; padding: 10px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; }
        .header-left { display: flex; align-items: center; }
        .header-left h1 { margin-left: 10px; font-size: 24px; }
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
        main { padding: 20px; }

        .cajitamm { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding-bottom: 6%; }
      
        .cho { border: 1px solid #854831; border-radius: 10px; padding: 20px; background-color: #ffffff; width: 200px; text-align: center; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.3s; }
        .cho:hover { transform: scale(1.05); } /* Animación al pasar el ratón */
        .publi { width: 100%; height: auto; }
        
        .select-button { 
            background-color: #e6007f; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            padding: 10px; 
            cursor: pointer; 
            transition: background-color 0.3s ease, transform 0.2s ease; 
        }
        .select-button:hover { 
            background-color: #c7006a; 
            transform: scale(1.05); 
        }

        .pie-pagina {
    background-color: #854831; /* Fondo en tono marrón claro */
    padding: 0%;
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
    width: 105%;
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
    </style>
</head>
<body>
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
        <button class="home-button" onclick="location.href='index-cliente.php'">Inicio</button>
    </header>
    
    <main>
        <?php foreach ($categorias as $categoria): ?>
            <h2><?php echo $categoria['nombre']; ?></h2>
            <div class="cajitamm">
                <?php foreach ($categoria['productos'] as $producto): ?>
                    <div class="cho">
                        <h2><?php echo $producto['nombre']; ?></h2>
                        <img class="publi" src="../img/<?php echo $producto['imagen']; ?>" height="250px"><br>
                        <p>Precio: $<?php echo $producto['precio']; ?></p>

                        <?php
                        // Verifica si es la categoría de helados o de conos excepto el producto con ID=19
                        if (($categoria['nombre'] == 'Helados' || $categoria['nombre'] == 'Conos') && $producto['id'] != 19): ?>
                            <a href="seleccionar_sabores.php?producto_id=<?= $producto['id'] ?>" class="select-button">Seleccionar Sabores</a>
                        <?php else: ?>
                            <form class="add" action="agregar_al_carrito.php" method="POST">
                                <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                                <button type="submit" class="select-button">Agregar al Carrito</button>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </main>

    <footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <h2>Calidad del Producto</h2>
            <p>En Tentaciones Heladas, nos dedicamos a ofrecerte helados artesanales de la más alta calidad. 
             <br> <br>  Utilizamos ingredientes frescos y naturales, seleccionados cuidadosamente para garantizar que 
                cada bocado sea una experiencia deliciosa y satisfactoria. <br><br> ¡Déjate llevar por la 
                frescura y la calidad que solo Tentaciones Heladas puede ofrecer!</p>
        </div>
        <div class="box">
            <h2>Contacto</h2>
            <p>Teléfono: 123-456-7890</p>
            <p>Email: info@tentacionesheladas.com</p>
            <a href="https://www.instagram.com/tentacionesheladass/?hl=es">Instagram</a>
        </div>
        <div class="box">
            <h2>Contáctanos</h2>
            <form action="../guardar_contacto.php" method="POST" class="contact-form">
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
</body>
</html>
