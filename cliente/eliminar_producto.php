<?php
session_start();

// Verificar que la sesión del carrito esté inicializada
if (isset($_SESSION['carrito'])) {
    // Obtener el índice del producto a eliminar
    $id = $_GET['id'];

    // Comprobar si el índice es válido
    if (isset($_SESSION['carrito'][$id])) {
        // Eliminar el producto del carrito
        unset($_SESSION['carrito'][$id]);
    }
}

// Redirigir de vuelta al carrito
header('Location: carrito.php');
exit();
?>
