<?php
include '../db.php'; // Conexión a la base de datos
session_start();

$cliente_id = $_SESSION['cliente_id'];
$fecha_pedido = date("Y-m-d H:i:s");
$numero_factura = rand(100000, 999999);

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
$stmt_carrito->bind_param("i", $cliente_id);
$stmt_carrito->execute();
$result_carrito = $stmt_carrito->get_result();

if ($result_carrito->num_rows === 0) {
    die("No hay productos en el carrito para generar la factura.");
}

$total = 0;
$productos = [];
while ($producto = $result_carrito->fetch_assoc()) {
    $total += $producto['subtotal'];
    $productos[] = $producto;
}

// 3. Insertar el pedido en la tabla pedidos
$query_pedido = "INSERT INTO pedidos (cliente_id, fecha_pedido, total, estado) VALUES (?, ?, ?, 'en preparación')";
$stmt_pedido = $conn->prepare($query_pedido);
$stmt_pedido->bind_param("isi", $cliente_id, $fecha_pedido, $total);
$stmt_pedido->execute();
$pedido_id = $stmt_pedido->insert_id;

// 4. Insertar los detalles del pedido en detalle_pedido
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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura de Compra - Tentaciones Heladas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
     
        header {
                background-color: #854831;
                color: #f4abba;
                padding: 10px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
            }
    
            .header-left {
                display: flex;
                align-items: center;
                gap: 20px;
                flex: 1;
            }
    
            .logo {
                max-width: 10%;
            }
    
            .header-info {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centrar elementos hijos horizontalmente */
    text-align: center; /* Centrar el texto dentro del contenedor */
    width: 100%; /* Asegúrate de que ocupe el ancho completo */
}


    
            .header-info h1 {
                margin: 0;
                font-size: 24px;
            }
    
            .nav-links {
                display: flex;
                align-items: center;
                gap: 20px;
                margin-top: 10px;
            }
    
            .nav-links a {
                color: #f4abba;
                text-decoration: none;
                padding: 5px;
            }
    
            .nav-links a:hover {
                text-decoration: underline;
     
            }
        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2, .footer p {
            color: #ff0099;
        }
        .client-info, .invoice-details {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ff0099;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th {
            background-color: #ff0099;
            color: #fff;
            padding: 12px;
        }
        td {
            border: 1px solid #ccc;
            padding: 12px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
        
        .grande{
    font-size:25px;
}
  
    </style>
</head>
<body>
<header>
    <div class="header-left">
            <img class="logo" src="../img/logo.png"   alt="logo">
            <div class="header-info">
                <h1>TENTACIONES HELADAS</h1>
          
                    <div class="nav-links" class="dropdown">
                        <a class="grande" href="index-cliente.php">Inicio</a>

                    </div>
       

          
        </div>
    </header>
<div class="invoice-container">
    <h2>Factura de Compra</h2>
    <p><strong>Tentaciones Heladas - Heladería Artesanal</strong><br>
       Teléfono: 123-456-7890 | Email: info@tentacionesheladas.com</p>
    <p><strong>Factura N°:</strong> <?php echo $numero_factura; ?><br>
       <strong>Fecha del Pedido:</strong> <?php echo $fecha_pedido; ?></p>

    <div class="client-info">
        <h3>Información del Cliente</h3>
        <p><strong>Nombre:</strong> <?php echo $cliente['nombre']; ?><br>
           <strong>Dirección:</strong> <?php echo $cliente['direccion']; ?><br>
           <strong>Email:</strong> <?php echo $cliente['email']; ?></p>
    </div>

    <div class="invoice-details">
        <h3>Detalles de la Compra</h3>
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
                    <td colspan="3">Total</td>
                    <td>$<?php echo number_format($total, 2); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="footer">
        <p>Gracias por su compra en Tentaciones Heladas. Esperamos que disfrute de nuestros productos artesanales.</p>
    </div>
</div>

