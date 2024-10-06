<?php
include 'db.php'; // Asegúrate de que la ruta a db.php sea correcta

// Consulta para obtener los productos
$query = "SELECT id, nombre, precio, imagen FROM productos";
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
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #854831;
            color: #f4abba;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .logo {
            max-width: 100px;
        }
        .header-info {
            flex: 1; /* Ocupa el espacio restante */
            text-align: center; /* Centra el texto del título */
        }
        .header-left a {
            color: #f4abba;
            text-decoration: none;
            padding: 10px 15px; /* Mejora del botón de inicio */
            border-radius: 5px;
            background-color: #854831; /* Color de fondo */
            transition: background-color 0.3s;
        }
        .header-left a:hover {
            background-color: #d99a8e; /* Color al pasar el mouse */
        }
        .cart-button {
            background-color: #f4abba;
            border: none;
            border-radius: 50%;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 20px;
            color: #854831;
        }
        .cart-button:hover {
            background-color: #d99a8e; /* Cambio de color al pasar el mouse */
        }
        .cajitamm {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Tres columnas */
            grid-gap: 30px; /* Espacio entre los productos */
            margin: 80px;
            padding: 0 20px; /* Espacio a los lados */
            text-align: center;
        }
        .cho {
            border-radius: 18px;
            border: 18px solid #f4abba;
            background-color: #f4abba;
            padding: 20px;
            transition: transform 0.3s;
        }
        .cho:hover {
            transform: scale(1.05); /* Efecto de zoom al pasar el mouse */
        }
        .publi {
            border-radius: 140px;
        }
        h1 {
            text-align: center; /* Centra el título */
        }
        .select-button {
            background-color: #854831;
            color: #f4abba;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .select-button:hover {
            background-color: #d99a8e; /* Cambio de color al pasar el mouse */
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
        // Verifica si se encontraron productos
        if ($result->num_rows > 0) {
            // Iterar sobre cada producto y mostrarlo
            while ($row = $result->fetch_assoc()) {
                echo "<div class='cho'>";
                echo "<h2>" . $row['nombre'] . "</h2>";
                echo "<img class='publi' src='" . $row['imagen'] . "' height='250px'><br>";
                echo "<p>Precio: $" . $row['precio'] . "</p>"; // Precio visible
                // Botón para seleccionar sabores
                echo "<form action='seleccionar_sabores.php' method='GET'>"; 
                echo "<input type='hidden' name='producto_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='select-button'>Seleccionar gustos</button>";
                echo "</form>";
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
// Cierra la conexión
$conn->close();
?>
