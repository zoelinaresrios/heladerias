<?php
session_start();
include '../db.php'; // Asegúrate de que la conexión a la base de datos sea correcta

$producto_id = $_POST['producto_id'];
$cliente_id = isset($_SESSION['cliente_id']) ? $_SESSION['cliente_id'] : NULL; // Cliente no necesita estar logueado
$cantidad = 1; // Establecemos la cantidad a 1, ya que quieres eliminar la cantidad del carrito

// Verificar si el producto ya está en el carrito para este cliente
$query = "SELECT cantidad FROM carrito WHERE producto_id = ? AND cliente_id IS NULL"; // Para clientes no logueados
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $producto_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si el producto ya está en el carrito, actualizamos la cantidad
    $row = $result->fetch_assoc();
    $nueva_cantidad = $row['cantidad'] + $cantidad; // Incrementamos la cantidad
    $update_query = "UPDATE carrito SET cantidad = ? WHERE producto_id = ? AND cliente_id IS NULL";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param('ii', $nueva_cantidad, $producto_id);
    $update_stmt->execute();
} else {
    // Si no está en el carrito, lo insertamos
    $insert_query = "INSERT INTO carrito (cliente_id, producto_id, cantidad, fecha_agregado) VALUES (?, ?, ?, NOW())";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param('iii', $cliente_id, $producto_id, $cantidad); // Asegúrate de que se envía la cantidad aquí
    $insert_stmt->execute();
}

// Redirigir de nuevo a helados_clientes.php
header('Location: helados_clientes.php');
exit();
?>
