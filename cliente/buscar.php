<?php
include '../db.php'; // Asegúrate de que la ruta a db.php sea correcta

// Activar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar conexión
if ($conn) {
    // echo "Conexión exitosa<br>"; // Puedes descomentar esto para depurar
} else {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Inicializar variable de búsqueda
$busqueda = '';
$categorias = [];

// Verificar si se ha enviado una consulta de búsqueda
if (isset($_GET['q'])) {
    $busqueda = $_GET['q'];
    $busqueda = $conn->real_escape_string($busqueda); // Evitar inyecciones SQL

    // Consulta para obtener las categorías y productos que coincidan con la búsqueda
    $query = "SELECT c.ID AS categoria_id, c.nombre AS categoria_nombre, p.ID AS producto_id, p.nombre AS producto_nombre, p.precio, p.imagen 
              FROM categorias c 
              LEFT JOIN productos p ON c.ID = p.categoria_id 
              WHERE c.nombre LIKE '%$busqueda%' OR p.nombre LIKE '%$busqueda%'
              ORDER BY c.ID, p.ID";
} else {
    // Consulta para obtener todas las categorías y productos si no hay búsqueda
    $query = "SELECT c.ID AS categoria_id, c.nombre AS categoria_nombre, p.ID AS producto_id, p.nombre AS producto_nombre, p.precio, p.imagen 
              FROM categorias c 
              LEFT JOIN productos p ON c.ID = p.categoria_id 
              ORDER BY c.ID, p.ID";
}

$result = $conn->query($query);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

// Organiza los productos por categoría
while ($row = $result->fetch_assoc()) {
    $categoria_id = $row['categoria_id'];
    $categoria_nombre = htmlspecialchars($row['categoria_nombre']);
    $producto_id = $row['producto_id'];
    $producto_nombre = htmlspecialchars($row['producto_nombre']);
    $producto_precio = htmlspecialchars($row['precio']);
    $producto_imagen = htmlspecialchars($row['imagen']);

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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4abba;
            color: #854831;
            margin: 0;
            padding: 0;
        }
        .logo {
            max-width: 80px; /* Tamaño más pequeño para el logo */
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

        .search-container {
            flex: 1;
            display: flex;
            justify-content: center; /* Centra la lupa de búsqueda */
            margin: 10px 0;
        }

        form {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 500px; /* Ajusta el tamaño máximo del campo de búsqueda */
        }

        input[type="search"] {
            border: 2px solid #e6007f; /* Color rosa para la barra de búsqueda */
            border-radius: 5px;
            padding: 8px;
            outline: none;
            color: #333;
            width: 100%;
        }

        input[type="search"]:focus {
            border-color: #d6007f;
        }

        button {
            background-color: #e6007f;
            border: none;
            border-radius: 5px;
            padding: 8px;
            margin-left: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        button svg {
            fill: #fff;
        }

        main {
            padding: 20px;
        }

        .cajitamm {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding-bottom: 6%;
        }

        .cho {
            border: 1px solid #854831;
            border-radius: 10px;
            padding: 20px;
            background-color: #ffffff;
            width: 200px;
            text-align: center;
            display: flex; /* Habilita flexbox */
            flex-direction: column; /* Organiza en columna */
            justify-content: space-between; /* Espacia los elementos */
        }

        .publi {
            width: 100%;
            height: auto;
        }

        /*:::::Pie de Pagina*/
        .pie-pagina {
            padding: 0%;
            width: 100%;
            background-color: #854831;
            margin-top: 20px;
        }
        .pie-pagina .grupo-1 {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 50px;
            padding: 45px 0px;
        }
        .pie-pagina .grupo-1 .box h2 {
            color: #f4abba;
            margin-bottom: 25px;
            font-size: 20px;
        }
        .pie-pagina .grupo-1 .box p {
            color: #efefef;
            margin-bottom: 10px;
        }
        .pie-pagina .grupo-1 .red-social a {
            display: inline-block;
            text-decoration: none;
            width: 45px;
            height: 45px;
            line-height: 45px;
            color: #fff;
            margin-right: 10px;
            background-color: #f4abba;
            text-align: center;
            transition: all 300ms ease;
        }
        .pie-pagina .grupo-1 .red-social a:hover {
            color: aqua;
        }
        .pie-pagina .grupo-2 {
            background-color: #754831;
            padding: 15px 10px;
            text-align: center;
            color: #fff;
        }
        .pie-pagina .grupo-2 small {
            font-size: 15px;
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
<body>
    <header>
        <div class="header-left">
            <img class="logo" src="../img/logo.png" alt="logo">
            <h1>TENTACIONES HELADAS</h1>

            <div class="dropdown">
            <a href="helados_cliente.php">Productos</a>
            <a href="index-cliente.php">incio</a>
        </div>
        <div class="search-container">
            <form id="form" role="search" action="" method="GET">
                <input type="search" id="query" name="q" placeholder="Buscar por categoría o producto..." aria-label="Search through site content" required>
                <button type="submit">
                    <svg width="30" height="30" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 19a8.5 8.5 0 1 0 0-17 8.5 8.5 0 0 0 0 17Z"></path>
                        <path d="M13.328 7.172A3.988 3.988 0 0 0 10.5 6a3.988 3.988 0 0 0-2.828 1.172"></path>
                        <path d="M13.5 13.5l7.5 7.5"></path>
                    </svg>
                </button>
            </form>
        </div>
    </header>

    <main>
        <h2>Resultados de la búsqueda<?php if ($busqueda) echo ": " . htmlspecialchars($busqueda); ?></h2>
        <div class="cajitamm">
            <?php if (!empty($categorias)): ?>
                <?php foreach ($categorias as $categoria): ?>
                    <h3><?php echo $categoria['nombre']; ?></h3>
                    <?php foreach ($categoria['productos'] as $producto): ?>
                        <div class="cho">
                            <img class="publi" src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                            <h4><?php echo $producto['nombre']; ?></h4>
                            <p>Precio: $<?php echo $producto['precio']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No se encontraron resultados.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <h2>Calidad del Producto</h2>
                <p>En Tentaciones Heladas, garantizamos la frescura y calidad en cada uno de nuestros productos.</p>
            </div>
            <div class="box">
                <h2>Contacto</h2>
                <p>Teléfono: 123-456-7890</p>
                <p>Email: info@tentacionesheladas.com</p>
            </div>
            <div class="box red-social">
                <h2>Redes Sociales</h2>
                <a href="#" target="_blank">Instagram</a>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
        </div>
    </footer>
</body>
</html>
