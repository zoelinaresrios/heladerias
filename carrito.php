<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #854831;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #854831;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #d9534f;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        button {
            display: block;
            margin: 20px auto;
            padding: 12px 24px;
            background-color: #854831;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #d99a8e;
        }
    </style>
</head>
<body>

<h1>Carrito de Compras</h1>
<table>
    <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Eliminar</th>
    </tr>

    <?php
    foreach ($_SESSION['carrito'] as $key => $producto) {
        $nombre = isset($producto['nombre']) ? $producto['nombre'] : 'Producto desconocido';
        $precio = isset($producto['Precio']) ? $producto['Precio'] : 0;

        // Sumar al total
        $total += $precio;

        echo "<tr>";
        echo "<td>$nombre</td>";
        echo "<td>$$precio</td>";
        echo "<td><a href='eliminar_producto.php?id=$key'>Eliminar</a></td>";
        echo "</tr>";
    }
    ?>
</table>

<button onclick="pagar()">Proceder a Pagar</button>

<script>
function pagar() {
    alert('Gracias por su compra!');
    window.location.href = 'index.php';
}
</script>

</body>
</html>
