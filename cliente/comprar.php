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
$query_factura = "INSERT INTO facturas (pedido_id, fecha_emision, total) VALUES (?, ?, ?)";
$stmt_factura = $conn->prepare($query_factura);
$stmt_factura->bind_param("isi", $pedido_id, $fecha_pedido, $total);
$stmt_factura->execute();

// Mostrar la factura con estilo
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura de Compra</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #ff0099;
        }
        .invoice-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .client-info, .invoice-details {
            margin-bottom: 20px;
            border-bottom: 2px solid #ff0099;
            padding-bottom: 10px;
        }
        .client-info p, .invoice-details p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #ff0099;
            color: #fff;
        }
        tfoot tr {
            font-weight: bold;
        }
        .total {
            text-align: right;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>

<div class="invoice-container">
    <h1>Factura de Compra</h1>
    <div class="client-info">
        <h2>Información del Cliente</h2>
        <p><strong>Nombre:</strong> <?php echo $cliente['nombre']; ?></p>
        <p><strong>Dirección:</strong> <?php echo $cliente['direccion']; ?></p>
        <p><strong>Email:</strong> <?php echo $cliente['email']; ?></p>
        <p><strong>Fecha del Pedido:</strong> <?php echo $fecha_pedido; ?></p>
    </div>

    <div class="invoice-details">
        <h2>Detalles de la Compra</h2>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo $producto['producto_nombre']; ?></td>
                    <td>$<?php echo number_format($producto['producto_precio'], 2); ?></td>
                    <td><?php echo $producto['producto_cantidad']; ?></td>
                    <td>$<?php echo number_format($producto['subtotal'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td>$<?php echo number_format($total, 2); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="footer">
    &copy; 2024 Tentaciones Heladas. Todos los derechos reservados.
</div>

</body>
</html>

<?php
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
