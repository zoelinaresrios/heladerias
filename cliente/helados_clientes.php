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

    <!-- Footer y scripts previamente definidos -->
</body>
</html>
