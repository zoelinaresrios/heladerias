<?php
session_start();
include '../db.php';

// Verifica si el cliente ha iniciado sesión
if (!isset($_SESSION['cliente_id'])) {
    echo "Debe iniciar sesión para agregar productos al carrito.";
    exit; // Detiene la ejecución del script
}

$producto_id = $_POST['producto_id'];
$cliente_id = $_SESSION['cliente_id'];
$fecha_agregado = date("Y-m-d H:i:s");

// Verifica si el producto ya está en el carrito
$check_query = "SELECT * FROM carrito WHERE cliente_id = ? AND producto_id = ?";
$stmt = $conn->prepare($check_query);
$stmt->bind_param("ii", $cliente_id, $producto_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "El producto ya está en el carrito.";
} else {
    // Agrega el producto al carrito
    $insert_query = "INSERT INTO carrito (cliente_id, producto_id, cantidad, fecha_agregado) VALUES (?, ?, 1, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("iis", $cliente_id, $producto_id, $fecha_agregado);
    
    if ($stmt->execute()) {
        echo "Producto agregado al carrito.";
    } else {
        echo "Error al agregar producto.";
    }
}
?>
