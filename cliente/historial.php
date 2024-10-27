<?php
require_once '../db.php';

session_start();

if (!isset($_SESSION['cliente_id'])) {
    echo "Debes iniciar sesión para ver el historial de compras.";
    exit;
}

$cliente_id = $_SESSION['cliente_id'];

$query = "
    SELECT pedidos.fecha_pedido, detalle_pedido.cantidad, detalle_pedido.subtotal, productos.nombre 
    FROM pedidos
    JOIN detalle_pedido ON pedidos.ID = detalle_pedido.pedido_id
    JOIN productos ON detalle_pedido.producto_id = productos.ID
    WHERE pedidos.cliente_id = ?
    ORDER BY pedidos.fecha_pedido DESC
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $cliente_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #ff0099;
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            margin: 20px auto; /* Añadido margen superior e inferior */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #ff0099;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-compras {
            text-align: center;
            font-size: 1.1em;
            color: #888;
            margin-top: 20px;
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
            font-size: 15px;
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
            color: #FFFFFF; /* Marrón oscuro */
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
            color: #FFFFFF; /* Marrón oscuro */
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
            width: 100%; /* Ajustado para ocupar el 100% del ancho */
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
<div class="container">
    <h2>Historial de Compras</h2>

    <?php if ($result && $result->num_rows > 0) : ?>
        <table>
            <tr>
                <th>Fecha de Pedido</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
            <?php while ($compra = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($compra['fecha_pedido']); ?></td>
                    <td><?php echo htmlspecialchars($compra['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($compra['cantidad']); ?></td>
                    <td><?php echo htmlspecialchars(number_format($compra['subtotal'], 2)); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else : ?>
        <p class="no-compras">No tienes compras registradas.</p>
    <?php endif; ?>

    <?php $stmt->close(); ?>
</div>

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
            <p>Email: info@tentacionesheladas.com</p>
            <a href="https://www.instagram.com/tentacionesheladass/?hl=es">Instagram</a>
        </div>
        <div class="box">
            <h2>Contáctanos</h2>
            <form action="../guardar_contacto.php" method="POST" class="contact-form">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

                <button type="submit">Enviar</button>
            </form>
       
