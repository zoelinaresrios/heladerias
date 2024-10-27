<?php
session_start();
include '../db.php'; // Asegúrate de que la ruta a db.php sea correcta

// Verifica si el usuario está autenticado
if (!isset($_SESSION['cliente_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = $_POST['producto_id'];
    $cliente_id = $_SESSION['cliente_id'];

    // Consulta para obtener el stock actual del producto
    $query = "SELECT stock FROM productos WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();

    if ($producto) {
        $stock_actual = $producto['stock'];

        if ($stock_actual > 0) {
            // Agrega el producto al carrito
            $query_insert = "INSERT INTO carrito (cliente_id, producto_id, cantidad, fecha_agregado) VALUES (?, ?, 1, NOW())";
            $stmt_insert = $conn->prepare($query_insert);
            $stmt_insert->bind_param("ii", $cliente_id, $producto_id);
            $stmt_insert->execute();

            // Resta el stock
            $nuevo_stock = $stock_actual - 1;
            $query_update = "UPDATE productos SET stock = ? WHERE ID = ?";
            $stmt_update = $conn->prepare($query_update);
            $stmt_update->bind_param("ii", $nuevo_stock, $producto_id);
            $stmt_update->execute();

            // Redirige al carrito después de agregar el producto
            header("Location: carrito.php");
            exit();
        } else {
            // Si no hay suficiente stock, almacena el mensaje en la sesión
            $_SESSION['mensaje_stock'] = "No hay suficiente stock para agregar este producto.";
            header("Location: helados_clientes.php"); // Redirige a la página de helados para clientes
            exit();
        }
    } else {
        echo "Producto no encontrado.";
    }
} else {
    echo "Método no permitido.";
}
