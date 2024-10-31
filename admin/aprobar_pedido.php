<?php
include '../db.php'; // Asegúrate de que la ruta a db.php sea correcta

// Verifica si hay un ID de pedido y un nuevo estado
if (isset($_GET['pedido_id']) && isset($_GET['nuevo_estado'])) {
    $pedido_id = $_GET['pedido_id'];
    $nuevo_estado = $_GET['nuevo_estado'];

    // Actualiza el estado del pedido
    $query_update = "UPDATE pedidos SET estado = ? WHERE ID = ?";
    $stmt = $conn->prepare($query_update);
    $stmt->bind_param("si", $nuevo_estado, $pedido_id);

    if ($stmt->execute()) {
        echo "Pedido actualizado a '$nuevo_estado' exitosamente.";
    } else {
        echo "Error al actualizar el pedido: " . $stmt->error;
    }
    $stmt->close();
}

// Consulta para obtener los pedidos
$query_pedidos = "SELECT p.ID, p.estado, c.nombre AS cliente_nombre FROM pedidos p JOIN clientes c ON p.cliente_id = c.ID";
$result_pedidos = $conn->query($query_pedidos);

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Aprobar Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4abba;
            color: #854831;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #854831;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #854831;
            color: #f4abba;
        }
        .btn {
            background-color: #854831;
            color: #f4abba;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #d99a8e; /* Cambio de color al pasar el mouse */
        }
    </style>
</head>
<body>";

echo "<h1>Lista de Pedidos</h1>";
echo "<table>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Estado</th>
            <th>Aprobar</th>
        </tr>";

if ($result_pedidos->num_rows > 0) {
    while ($row = $result_pedidos->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['ID']) . "</td>
                <td>" . htmlspecialchars($row['cliente_nombre']) . "</td>
                <td>" . htmlspecialchars($row['estado']) . "</td>
                <td>
                    <a href='aprobar_pedido.php?pedido_id=" . $row['ID'] . "&nuevo_estado=listo' class='btn'>Marcar como Listo</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay pedidos.</td></tr>";
}

echo "</table>";
echo "</body></html>";

$conn->close();
