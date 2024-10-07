<?php
session_start();

// Verifica si el carrito existe en la sesión
if (isset($_SESSION['carrito'])) {
    // Obtiene el ID del producto a eliminar
    $id = $_GET['id'];

    // Elimina el producto del carrito
    if (array_key_exists($id, $_SESSION['carrito'])) {
        unset($_SESSION['carrito'][$id]);
    }
}

// Redirige de vuelta al carrito
header('Location: carrito.php');
exit();
?>
