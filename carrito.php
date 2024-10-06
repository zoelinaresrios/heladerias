<?php
session_start();
include('db.php');

// Manejo de la eliminación de productos del carrito
if (isset($_POST['eliminar'])) {
    $producto_id_a_eliminar = $_POST['producto_id'];
    foreach ($_SESSION['carrito'] as $key => $item) {
        if ($item['producto_id'] == $producto_id_a_eliminar) {
            unset($_SESSION['carrito'][$key]); // Eliminar el producto del carrito
            break;
        }
    }
    // Reindexar el array de carrito
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
}

// Manejo de la finalización de la compra
if (isset($_POST['finalizar_compra'])) {
    // Vaciar el carrito después de la compra
    $_SESSION['carrito'] = [];

    // Mensaje de agradecimiento y redirección
    echo "<script>
            alert('Gracias por su compra!');
            window.location.href = 'index.php';
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        .carrito-item {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        .finalizar {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Carrito</h1>
    <div>
        <?php
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
            foreach ($_SESSION['carrito'] as $item) {
                // Obtener información del producto
                $producto_id = $item['producto_id'];
                $sql_producto = "SELECT * FROM productos WHERE id = $producto_id";
                $result_producto = $conn->query($sql_producto);
                $producto = $result_producto->fetch_assoc();

                echo "<div class='carrito-item'>";
                echo "<h3>Producto: " . $producto['nombre'] . "</h3>";
                echo "<p>Precio: $" . $producto['Precio'] . "</p>";

                // Verificar si 'sabores' existe y es un array
                if (isset($item['sabores']) && is_array($item['sabores'])) {
                    // Obtener nombres de los sabores
                    $nombres_sabores = [];
                    foreach ($item['sabores'] as $sabor_id) {
                        $sql_sabor = "SELECT nombre FROM sabores WHERE id = $sabor_id";
                        $result_sabor = $conn->query($sql_sabor);
                        if ($result_sabor->num_rows > 0) {
                            $sabor = $result_sabor->fetch_assoc();
                            $nombres_sabores[] = $sabor['nombre'];
                        }
                    }
                    echo "<p>Sabores seleccionados: " . implode(", ", $nombres_sabores) . "</p>";
                } else {
                    echo "<p>Sabores seleccionados: Ninguno</p>"; // O algún mensaje alternativo
                }

                // Botón para eliminar el producto
                echo "<form method='post' action=''>
                        <input type='hidden' name='producto_id' value='" . $producto_id . "'>
                        <button type='submit' name='eliminar'>Eliminar</button>
                      </form>";
                echo "</div>";
            }

            // Botón para finalizar compra
            echo "<form method='post' action=''>";
            echo "<button type='submit' name='finalizar_compra' class='finalizar'>Finalizar Compra</button>";
            echo "</form>";
        } else {
            echo "<p>No hay productos en el carrito.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
