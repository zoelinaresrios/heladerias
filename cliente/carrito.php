<?php
session_start();
include '../db.php';

$cliente_id = $_SESSION['cliente_id'];
$query = "SELECT carrito.producto_id, productos.nombre, productos.precio, carrito.cantidad
          FROM carrito
          JOIN productos ON carrito.producto_id = productos.ID
          WHERE carrito.cliente_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $cliente_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h1>Tu Carrito</h1>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>{$row['nombre']} - Cantidad: {$row['cantidad']} - Precio: {$row['precio']}</p>";
    }
    echo '<form action="comprar.php" method="post">
            <button type="submit" name="comprar">Comprar</button>
          </form>';
} else {
    echo "Tu carrito está vacío.";
}
?>
