<?php
session_start();
include '../db.php';

$cliente_id = $_SESSION['cliente_id'];
$fecha_pedido = date("Y-m-d H:i:s");

// Calcula el total del carrito
$total = 0;
$select_query = "SELECT producto_id, cantidad, productos.precio FROM carrito JOIN productos ON carrito.producto_id = productos.ID WHERE carrito.cliente_id = ?";
$stmt = $conn->prepare($select_query);
$stmt->bind_param("i", $cliente_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $total += $row['cantidad'] * $row['precio'];
}

// Inserta en la tabla pedidos
$insert_pedido = "INSERT INTO pedidos (cliente_id, fecha_pedido, total, estado) VALUES (?, ?, ?, 'pendiente')";
$stmt = $conn->prepare($insert_pedido);
$stmt->bind_param("isd", $cliente_id, $fecha_pedido, $total);

if ($stmt->execute()) {
    $pedido_id = $stmt->insert_id;

    // Inserta en detalle_pedido
    $result->data_seek(0); // Reinicia el resultado
    while ($row = $result->fetch_assoc()) {
        $subtotal = $row['cantidad'] * $row['precio'];
        $insert_detalle = "INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad, subtotal) VALUES (?, ?, ?, ?)";
        $stmt_detalle = $conn->prepare($insert_detalle);
        $stmt_detalle->bind_param("iiid", $pedido_id, $row['producto_id'], $row['cantidad'], $subtotal);
        $stmt_detalle->execute();
    }

    // Limpia el carrito después de la compra
    $delete_carrito = "DELETE FROM carrito WHERE cliente_id = ?";
    $stmt = $conn->prepare($delete_carrito);
    $stmt->bind_param("i", $cliente_id);
    $stmt->execute();

    echo "Compra realizada exitosamente.";
} else {
    echo "Error al realizar la compra.";
}
?>
