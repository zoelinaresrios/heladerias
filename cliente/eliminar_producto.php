<?php
session_start();
include '../db.php'; // Conexión a la base de datos

// Verificar que el usuario haya iniciado sesión
if (!isset($_SESSION['cliente_id'])) {
    echo "Debes iniciar sesión para eliminar productos del carrito.";
    exit;
}

$cliente_id = $_SESSION['cliente_id'];

// Verificar si se ha recibido el producto_id a eliminar
if (isset($_POST['producto_id'])) {
    $producto_id = $_POST['producto_id'];

    // Consulta para eliminar el producto específico del carrito del cliente
    $query = "DELETE FROM carrito WHERE cliente_id = ? AND producto_id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ii", $cliente_id, $producto_id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
}

// Redirigir de vuelta al carrito después de eliminar el producto
header('Location: carrito.php');
exit();
?>
