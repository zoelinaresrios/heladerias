<?php
include '../db.php'; // Conexión a la base de datos
session_start();

$cliente_id = $_SESSION['cliente_id'];

// Configura la fecha y hora actual para el pedido
$fecha_pedido = date("Y-m-d H:i:s");
$usuario_id = $_SESSION['cliente_id']; // ID del cliente actual

// 1. Consultar los datos del cliente
$query_cliente = "SELECT nombre, direccion, email FROM clientes WHERE ID = ?";
$stmt_cliente = $conn->prepare($query_cliente);
$stmt_cliente->bind_param("i", $cliente_id);
$stmt_cliente->execute();
$result_cliente = $stmt_cliente->get_result();

if ($result_cliente->num_rows === 0) {
    die("No se encontró información del cliente.");
}

$cliente = $result_cliente->fetch_assoc();

// 2. Consultar los productos en el carrito del cliente
$query_carrito = "
    SELECT 
        p.ID AS producto_id,
        p.nombre AS producto_nombre,
        p.precio AS producto_precio,
        c.cantidad AS producto_cantidad,
        (p.precio * c.cantidad) AS subtotal
    FROM carrito AS c
    JOIN productos AS p ON c.producto_id = p.ID
    WHERE c.cliente_id = ?
";

$stmt_carrito = $conn->prepare($query_carrito);
$stmt_carrito->bind_param("i", $usuario_id);
$stmt_carrito->execute();
$result_carrito = $stmt_carrito->get_result();

// Verificar que haya productos en el carrito
if ($result_carrito->num_rows === 0) {
    die("No hay productos en el carrito para generar la factura.");
}

// Calcular el total de la compra
$total = 0;
$productos = [];
while ($producto = $result_carrito->fetch_assoc()) {
    $total += $producto['subtotal'];
    $productos[] = $producto; // Guardar los productos para el detalle del pedido
}

// 3. Insertar el pedido en la tabla `pedidos`
$query_pedido = "INSERT INTO pedidos (cliente_id, fecha_pedido, total, estado) VALUES (?, ?, ?, 'en preparación')";
$stmt_pedido = $conn->prepare($query_pedido);
$stmt_pedido->bind_param("isi", $usuario_id, $fecha_pedido, $total);
$stmt_pedido->execute();
$pedido_id = $stmt_pedido->insert_id; // Obtener el ID del nuevo pedido

// 4. Insertar los detalles del pedido en `detalle_pedido`
$query_detalle = "INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad, subtotal) VALUES (?, ?, ?, ?)";
$stmt_detalle = $conn->prepare($query_detalle);

foreach ($productos as $producto) {
    $stmt_detalle->bind_param("iiid", $pedido_id, $producto['producto_id'], $producto['producto_cantidad'], $producto['subtotal']);
    $stmt_detalle->execute();
}

// 5. Registrar la factura
$query_factura = "INSERT INTO facturas (pedido_id, fecha_emisión, total) VALUES (?, ?, ?)";
$stmt_factura = $conn->prepare($query_factura);
$stmt_factura->bind_param("isi", $pedido_id, $fecha_pedido, $total);
$stmt_factura->execute();

// Mostrar la factura
echo "<h1>Factura de Compra</h1>";
echo "<p><strong>Nombre del Cliente:</strong> {$cliente['nombre']}</p>";
echo "<p><strong>Dirección:</strong> {$cliente['direccion']}</p>";
echo "<p><strong>Email:</strong> {$cliente['email']}</p>";
echo "<p><strong>Fecha del Pedido:</strong> $fecha_pedido</p>";
echo "<table border='1' style='width:100%; border-collapse: collapse;'>
        <tr>
            <th>Producto</th>
            <th>Precio Unitario</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>";

foreach ($productos as $producto) {
    echo "<tr>
            <td>{$producto['producto_nombre']}</td>
            <td>\${$producto['producto_precio']}</td>
            <td>{$producto['producto_cantidad']}</td>
            <td>\${$producto['subtotal']}</td>
          </tr>";
}

echo "</table>";
echo "<p><strong>Total: \$$total</strong></p>";

// Limpiar el carrito después de la compra
$query_eliminar_carrito = "DELETE FROM carrito WHERE cliente_id = ?";
$stmt_eliminar_carrito = $conn->prepare($query_eliminar_carrito);
$stmt_eliminar_carrito->bind_param("i", $usuario_id);
$stmt_eliminar_carrito->execute();

// Cierra las conexiones
$stmt_cliente->close();
$stmt_carrito->close();
$stmt_pedido->close();
$stmt_detalle->close();
$stmt_factura->close();
$stmt_eliminar_carrito->close();
$conn->close();
?>
