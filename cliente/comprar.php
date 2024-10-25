<?php
include '../db.php'; // Incluye la conexión a la base de datos

session_start();

// Verifica que el usuario haya iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    die("Debes iniciar sesión para continuar.");
}

// Configuración de datos de factura
$fecha = date("Y-m-d H:i:s");

// Consulta SQL para obtener los datos del cliente y los productos en el carrito
$query_factura = "
    SELECT 
        cl.nombre AS cliente_nombre,
        cl.apellido AS cliente_apellido,
        cl.direccion AS cliente_direccion,
        cl.email AS cliente_email,
        p.nombre AS producto_nombre,
        p.precio AS producto_precio,
        dp.cantidad AS producto_cantidad,
        (p.precio * dp.cantidad) AS subtotal
    FROM clientes AS cl
    JOIN pedidos AS pd ON pd.cliente_id = cl.ID
    JOIN detalle_pedido AS dp ON dp.pedido_id = pd.ID
    JOIN productos AS p ON p.ID = dp.producto_id
    WHERE cl.ID = ?
";

$stmt = $conn->prepare($query_factura);
$stmt->bind_param("i", $_SESSION['usuario_id']);
$stmt->execute();
$result_factura = $stmt->get_result();

// Imprimir detalles de la factura
$cliente = $result_factura->fetch_assoc();
echo "<h1>Factura de Compra</h1>";
echo "<p>Fecha: $fecha</p>";
echo "<p>Cliente: {$cliente['cliente_nombre']} {$cliente['cliente_apellido']}</p>";
echo "<p>Dirección: {$cliente['cliente_direccion']}</p>";
echo "<p>Email: {$cliente['cliente_email']}</p>";

echo "<table border='1'>
        <tr>
            <th>Producto</th>
            <th>Precio Unitario</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>";

$total = 0;
do {
    echo "<tr>
            <td>{$cliente['producto_nombre']}</td>
            <td>\${$cliente['producto_precio']}</td>
            <td>{$cliente['producto_cantidad']}</td>
            <td>\${$cliente['subtotal']}</td>
          </tr>";
    $total += $cliente['subtotal'];
} while ($cliente = $result_factura->fetch_assoc());

echo "</table>";
echo "<p><strong>Total: \$$total</strong></p>";

// Cierra la conexión
$stmt->close();
$conn->close();
?>
