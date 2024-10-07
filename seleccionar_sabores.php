<?php
include 'db.php'; // Asegúrate de que la ruta a db.php sea correcta

// Verifica si se recibió el producto_id
if (isset($_GET['producto_id'])) {
    $producto_id = $_GET['producto_id'];

    // Consulta para obtener los detalles del producto
    $query_producto = "SELECT nombre, precio FROM productos WHERE id = $producto_id";
    $result_producto = $conn->query($query_producto);

    if ($result_producto->num_rows > 0) {
        $producto = $result_producto->fetch_assoc();
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Seleccionar Sabores - " . htmlspecialchars($producto['nombre']) . "</title>
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
                nav {
                    display: flex;
                    gap: 20px;
                }
                nav a {
                    color: #f4abba;
                    text-decoration: none;
                    padding: 10px;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                }
                nav a:hover {
                    background-color: #d99a8e;
                }
                h1 {
                    text-align: center;
                    margin-top: 20px;
                }
                form {
                    max-width: 600px;
                    margin: auto;
                    padding: 20px;
                    border: 2px solid #854831;
                    border-radius: 10px;
                    background-color: #ffffff;
                }
                label {
                    font-weight: bold;
                }
                .sabor {
                    margin: 10px 0;
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
                    background-color: #d99a8e; /* Cambio de color al pasar el mouse */
                }
            </style>
        </head>
        <body>";

        echo "<header>
                <img class='logo' src='img/logo.png' alt='logo'>
                <nav>
                    <a href='../index-cliente.php'>Inicio</a>
                    <a href='seleccionar_sabores.php?producto_id=" . $producto_id . "'>Volver</a>
                    <a href='carrito.php'>Carrito</a>
                </nav>
              </header>";

        echo "<h1>Seleccionar Sabores para " . htmlspecialchars($producto['nombre']) . "</h1>";
        echo "<p style='text-align: center;'>Precio: $" . htmlspecialchars($producto['precio']) . "</p>";

        // Número de sabores requeridos
        $num_sabores_requeridos = ($producto_id == 21) ? 3 : (($producto_id == 20) ? 1 : 7);

        echo "<form action='agregar_al_carrito.php' method='POST'>";
        echo "<h3>Elige $num_sabores_requeridos sabores:</h3>";

        // Consulta para obtener los sabores
        $query_sabores = "SELECT id, nombre, stock FROM sabores"; 
        $result_sabores = $conn->query($query_sabores);

        if ($result_sabores->num_rows > 0) {
            echo "<div id='sabores-container'>";
            while ($row = $result_sabores->fetch_assoc()) {
                echo "<div class='sabor' data-id='" . $row['id'] . "'>";
                echo "<span>" . htmlspecialchars($row['nombre']) . " (Stock: " . htmlspecialchars($row['stock']) . ")</span>";
                echo "<input type='checkbox' name='sabores[]' value='" . $row['id'] . "'> Seleccionar<br>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "No se encontraron sabores.";
        }

        // Campo oculto para el producto
        echo "<input type='hidden' name='producto_id' value='" . $producto_id . "'>";

        // Botón para agregar al carrito
        echo "<button type='submit' class='select-button'>Agregar al Carrito</button>";
        echo "</form>";

        // Agregar el script para validar selección
        echo "<script>
                const saborCheckboxes = document.querySelectorAll('input[name=\"sabores[]\"]');
                const numSaboresRequeridos = " . $num_sabores_requeridos . ";

                document.querySelector('form').addEventListener('submit', function(event) {
                    const selectedCount = Array.from(saborCheckboxes).filter(checkbox => checkbox.checked).length;
                    if (selectedCount !== numSaboresRequeridos) {
                        alert('Debes seleccionar exactamente ' + numSaboresRequeridos + ' sabores.');
                        event.preventDefault(); // Evita que se envíe el formulario
                    }
                });
              </script>";

        echo "</body></html>";

    } else {
        echo "Producto no encontrado.";
    }
} else {
    echo "No se recibió ningún producto.";
}

// Cierra la conexión
$conn->close();
?>
