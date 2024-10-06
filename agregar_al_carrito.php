<?php
session_start();
include 'db.php'; // Asegúrate de que la ruta a db.php sea correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['producto_id'];
    $num_sabores = $_POST['num_sabores'];
    $sabores_seleccionados = isset($_POST['sabores']) ? $_POST['sabores'] : [];

    // Validar la cantidad de sabores seleccionados
    if (count($sabores_seleccionados) > $num_sabores) {
        echo "No puedes seleccionar más sabores de los permitidos.";
        exit();
    }

    // Aquí puedes agregar la lógica para manejar el carrito
    // Ejemplo: almacenar el producto y los sabores en $_SESSION
    $_SESSION['carrito'][] = [
        'producto_id' => $producto_id,
        'num_sabores' => $num_sabores,
        'sabores' => $sabores_seleccionados
    ];

    // Redirigir al carrito o a una página de confirmación
    header('Location: carrito.php'); // Asegúrate de que la página del carrito exista
    exit();
}
?>