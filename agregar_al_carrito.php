<?php
session_start();
include 'db.php'; // Asegúrate de que la conexión a la base de datos sea correcta

$producto_id = $_POST['producto_id'];

// Consulta para obtener el producto de la base de datos
$query = "SELECT nombre, Precio FROM productos WHERE ID = $producto_id"; // Cambia 'precio' a 'Precio'
$result = $conn->query($query);
$producto = $result->fetch_assoc();

if ($producto) {
    $_SESSION['carrito'][] = [
        'producto_id' => $producto_id,
        'nombre' => $producto['nombre'],
        'Precio' => $producto['Precio'], // Cambia a 'Precio' con 'P' mayúscula
        'sabores' => [] // Aquí puedes agregar la lógica para los sabores si es necesario
    ];
}

// Redirigir de nuevo a helados_clientes.php
header('Location: helados_clientes.php');
exit();
?>
