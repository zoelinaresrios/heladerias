<?php
session_start();
include '../db.php';

$producto_id = $_POST['producto_id']; // Asumiendo que este ID se envía desde un formulario
$cliente_id = $_SESSION['cliente_id'];

// Verificar si el producto ya existe en el carrito
$query = "SELECT cantidad FROM carrito WHERE cliente_id = ? AND producto_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $cliente_id, $producto_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si existe, actualizamos la cantidad
    $row = $result->fetch_assoc();
    $nueva_cantidad = $row['cantidad'] + 1; // Aumentamos la cantidad
    $update_query = "UPDATE carrito SET cantidad = ? WHERE cliente_id = ? AND producto_id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("iii", $nueva_cantidad, $cliente_id, $producto_id);
    $update_stmt->execute();
} else {
    // Si no existe, insertamos el nuevo producto
    $insert_query = "INSERT INTO carrito (cliente_id, producto_id, cantidad) VALUES (?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_query);
    $cantidad = 1; // La cantidad inicial es 1
    $insert_stmt->bind_param("iii", $cliente_id, $producto_id, $cantidad);
    $insert_stmt->execute();
}

header("Location: carrito.php"); // Redirige al carrito
exit();

?>
