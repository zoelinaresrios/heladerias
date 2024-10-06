<?php
session_start();
require 'db.php'; // Asegúrate de que este archivo está en el mismo directorio

// Recibir datos del formulario
$usuario = $_POST['usuario'] ?? '';
$contraseña = $_POST['contraseña'] ?? '';

// Consulta para buscar el usuario en la base de datos
$stmt = $conn->prepare("SELECT contraseña FROM Clientes WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // El usuario existe, ahora verifica la contraseña
    $row = $result->fetch_assoc();
    $hashed_password = $row['contraseña'];

    if (password_verify($contraseña, $hashed_password)) {
        // Credenciales correctas, redirigir a index.php
        header('Location: index-cliente.php');
        exit();
    } else {
        // Contraseña incorrecta
        header('Location: logeo.php?error=1');
        exit();
    }
} else {
    // Usuario no encontrado
    header('Location: logeo.php?error=1');
    exit();
}

$stmt->close();
$conn->close();
?>
