<?php
include 'db.php'; // Asegúrate de que la ruta a db.php sea correcta

// Consulta para obtener los productos
$query = "SELECT ID, nombre, precio, imagen, categoria_id FROM productos"; 
$result = $conn->query($query);
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
            padding: 20px;
        }
        header {
            background-color: #854831;
            color: #f4abba;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            max-width: 100px;
        }
        .header-info {
            flex-grow: 1;
            text-align: center;
        }
        .select-button {
            background-color: #854831;
            color: #f4abba;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            margin-top: 20px;
            width: 100%;
        }
        .select-button:hover {
            background-color: #d99a8e;
        }
        .cajitamm {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .cho {
            border: 1px solid #854831;
            border-radius: 10px;
            padding: 20px;
            background-color: #ffffff;
            width: 200px;
            text-align: center;
        }
        .publi {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-left">
            <img class="logo" src="img/logo.png" alt="logo">
            <a href="index-cliente.php">Inicio</a>
        </div>
        <div class="header-info">
            <h1>TENTACIONES HELADAS</h1>
        </div>
        <a href="carrito.php">
            <button class="cart-button">C</button>
        </a>
    </header>
    <br>

    <div class="cajitamm">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $producto_id = $row['ID'];
                $producto_nombre = htmlspecialchars($row['nombre']);
                $producto_precio = htmlspecialchars($row['precio']);
                $producto_imagen = htmlspecialchars($row['imagen']);
                $categoria_id = $row['categoria_id'];

                echo "<div class='cho'>";
                echo "<h2>$producto_nombre</h2>";
                echo "<img class='publi' src='$producto_imagen' height='250px'><br>";

                // Lógica para determinar el formulario
                if ($producto_id == 18) {
                    // Para el producto con ID 18, redirige a seleccionar sabores
                    echo "<form action='seleccionar_sabores.php' method='GET'>";
                    echo "<input type='hidden' name='producto_id' value='$producto_id'>";
                    echo "<button type='submit' class='select-button'>Seleccionar Sabores</button>";
                    echo "</form>";
                } elseif ($producto_id == 21) {
                    // Para el ID 21, seleccionar 3 sabores
                    echo "<form action='sabor_cono_3.php' method='GET'>";
                    echo "<input type='hidden' name='producto_id' value='$producto_id'>";
                    echo "<button type='submit' class='select-button'>Seleccionar 3 Sabores</button>";
                    echo "</form>";
                } elseif ($categoria_id == 11) {
                    // Para productos de categoria_id 11, agregar al carrito
                    echo "<form action='agregar_al_carrito.php' method='POST'>";
                    echo "<input type='hidden' name='producto_id' value='$producto_id'>";
                    echo "<button type='submit' class='select-button'>Agregar al Carrito</button>";
                    echo "</form>";
                } elseif ($categoria_id == 9) {
                    // Para la categoría 9, redirige a seleccionar sabores
                    echo "<form action='seleccionar_sabores.php' method='GET'>";
                    echo "<input type='hidden' name='producto_id' value='$producto_id'>";
                    echo "<button type='submit' class='select-button'>Seleccionar Sabores</button>";
                    echo "</form>";
                } else {
                    // Para las paletas, solo el botón de agregar al carrito
                    echo "<form action='agregar_al_carrito.php' method='POST'>";
                    echo "<input type='hidden' name='producto_id' value='$producto_id'>";
                    echo "<button type='submit' class='select-button'>Agregar al Carrito</button>";
                    echo "</form>";
                }

                echo "</div>";
            }
        } else {
            echo "No se encontraron helados.";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
