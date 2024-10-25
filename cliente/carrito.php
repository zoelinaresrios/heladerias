<?php
session_start();
include '../db.php';

$cliente_id = $_SESSION['cliente_id'];

// Obtener productos en el carrito
$query = "SELECT carrito.producto_id, productos.nombre, productos.precio, carrito.cantidad
          FROM carrito
          JOIN productos ON carrito.producto_id = productos.ID
          WHERE carrito.cliente_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $cliente_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <style>
        .carrito-tabla {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            text-align: center;
        }

        .carrito-tabla th, .carrito-tabla td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .carrito-tabla th {
            background-color: #ff0099;
            color: white;
            font-weight: bold;
        }

        .total {
            font-weight: bold;
            color: #ff0099;
            text-align: right;
            padding: 10px;
        }

        .boton-eliminar {
            background-color: #ff6666;
            border: none;
            color: white;
            padding: 5px 10px;
            cursor: pointer;
        }

        .boton-eliminar:hover {
            background-color: #ff4c4c;
        }

        .boton-comprar {
            margin-top: 20px;
            background-color: #ff0099;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .boton-comprar:hover {
            background-color: #e6007a;
        }
    </style>
</head>
<body>

<h1 style="text-align:center;">Tu Carrito</h1>

<table class="carrito-tabla">
    <tr>
        <th>Producto</th>
        <th>Precio Unitario</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
        <th>Acciones</th>
    </tr>

    <?php
    $total = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $subtotal = $row['precio'] * $row['cantidad'];
            $total += $subtotal;
            
            echo "<tr>
                    <td>{$row['nombre']}</td>
                    <td>$ {$row['precio']}</td>
                    <td>{$row['cantidad']}</td>
                    <td>$ {$subtotal}</td>
                    <td>
                        <form action='eliminar_producto.php' method='post' style='display:inline;'>
                            <input type='hidden' name='producto_id' value='{$row['producto_id']}'>
                            <button type='submit' name='eliminar' class='boton-eliminar'>Eliminar</button>
                        </form>
                    </td>
                  </tr>";
        }

        echo "<tr>
                <td colspan='3' class='total'>Total:</td>
                <td colspan='2' class='total'>$ {$total}</td>
              </tr>";
    } else {
        echo "<tr><td colspan='5'>Tu carrito está vacío.</td></tr>";
    }
    ?>
</table>

<div style="text-align: center;">
    <form action="comprar.php" method="post">
        <button type="submit" name="comprar" class="boton-comprar">Comprar</button>
    </form>
</div>

</body>
</html>
