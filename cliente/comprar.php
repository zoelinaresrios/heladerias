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
        h2 {
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
                max-width:10%;
            }
            .header-info h1 {
                margin: 0;
                font-size: 24px;
            }
            .header-info {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centrar elementos hijos horizontalmente */
    text-align: center; /* Centrar el texto dentro del contenedor */
    width: 100%; /* Asegúrate de que ocupe el ancho completo */
}
.header-icons{
    display: flex;
    flex-direction: column;
    align-items: center; /* Centrar elementos hijos horizontalmente */
    text-align: center; /* Centrar el texto dentro del contenedor */
  
}

   
.dropdown {
                position: relative;
                display: inline-block;
            }
    
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #8e6c49;
                top: 100%;
                left: 0;
                list-style: none;
                padding: 0;
                margin: 0;
                min-width: 150px;
                z-index: 1;
            }
    
            .dropdown-content li {
                border-bottom: 1px solid #555;
            }
    
            .dropdown-content li a {
                padding: 10px;
                color: #fff;
                text-decoration: none;
                display: block;
            }
    
            .dropdown-content li a:hover {
                background-color: #8e6c;
            }
    
            .dropdown:hover .dropdown-content {
                display: block;
            }
            
        

            .pie-pagina {
    background-color: #854831; /* Fondo en tono marrón claro */
    padding: 0%;
    color: #FFFFFF; /* Texto marrón oscuro */
}

.grupo-1 {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: auto;
    padding-right: 50px;
    font-size:15px;
}

.box {
    width: 30%;
    text-align: left;
    padding-left: 70px;
}

.box h2 {
    font-size: 1.5em;
    color: #f4abba; /* Color rosa */
    margin-bottom: 10px;
}

.box p, .box a {
    font-size: 1em;
    color: ##FFFFFF; /* Marrón oscuro */
}

.box a {
    text-decoration: none;
    color: #f4abba; /* Enlaces en rosa */
}

.contact-form {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Espacio entre campos */
}

.contact-form label {
    font-size: 1em;
    color: ##FFFFFF; /* Marrón oscuro */
}

.contact-form input, .contact-form textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #ff0099; /* Bordes en rosa */
    border-radius: 8px; /* Bordes redondeados */
    font-size: 1em;
    background-color: #fef5f9; /* Fondo claro */
    color: #5d4037; /* Texto marrón oscuro */
}

.contact-form input:focus, .contact-form textarea:focus {
    outline: none;
    border-color: #a65380; /* Cambio de color al enfocar */
}

.contact-form button {
    background-color: #ff0099; /* Fondo del botón rosa */
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.1em;
    transition: background-color 0.3s ease;
    width: 105%;
}

.contact-form button:hover {
    background-color: #a65380; /* Rosa oscuro al pasar el mouse */
}

.grupo-2 {
    text-align: center;
    margin-top: 20px;
    background-color: #f4abba; /* Fondo marrón oscuro */
    color: black;
    padding: 10px 0;
}

.grupo-2 small {
    font-size: 0.9em;
}
   

        /* Estilos del formulario de contacto */
        .formulario-contacto {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .formulario-contacto input,
        .formulario-contacto textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        @media screen and (max-width:800px) {
            .pie-pagina .grupo-1 {
                width: 90%;
                grid-template-columns: repeat(1, 1fr);
                grid-gap: 30px;
                padding: 35px 0px;
            }
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
                        <a class="grande" href="helados_clientes.php">Productos</a>
                    </div>
       

          
        </div>
    </header>

<br><br><br>


<div class="invoice-container">
    <h2>Factura de Compra</h2>
    <div class="client-info">
        <h3>Información del Cliente</h3>
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
<br><br><br><br>
<footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <h2>Calidad del Producto</h2>
            <p>En Tentaciones Heladas, nos dedicamos a ofrecerte helados artesanales de la más alta calidad. <br><br>
                Utilizamos ingredientes frescos y naturales, seleccionados cuidadosamente para garantizar que 
                cada bocado sea una experiencia deliciosa y satisfactoria. <br> <br>¡Déjate llevar por la 
                frescura y la calidad que solo Tentaciones Heladas puede ofrecer!</p>
        </div>
        <div class="box">
            <h2>Contacto</h2>
            <p>Teléfono: 123-456-7890</p>
            <p>Email: @tentacionesheladass.gmail.com</p>
            <a href="https://www.instagram.com/tentacionesheladass/?hl=es">Instagram</a>
        </div>
        <div class="box">
            <h2>Contáctanos</h2>
            <form action="../guardar_contacto.php" method="POST" class="contact-form">
                <label for="nombre">Nombre </label>
                <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre">

                <label for="email">Email </label>
                <input type="email" id="email" name="email" required placeholder="Tu email">

                <label for="mensaje">Mensaje </label>
                <textarea id="mensaje" name="mensaje" required placeholder="Tu mensaje"></textarea>

                <button type="submit">ENVIAR</button>
            </form>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
</footer>
    


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
