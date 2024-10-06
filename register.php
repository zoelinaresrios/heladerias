<?php
include 'db.php'; // Asegúrate de que la ruta sea correcta

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    // Hashear la contraseña
    $contraseña_hashed = password_hash($contraseña, PASSWORD_DEFAULT);

    // Preparar la consulta
    $sql = "INSERT INTO Clientes (nombre, apellido, email, usuario, contraseña, telefono, direccion) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nombre, $apellido, $email, $usuario, $contraseña_hashed, $telefono, $direccion);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a index.php después de un registro exitoso
        header("Location: index-cliente.php");
        exit(); // Asegúrate de salir después de la redirección
    } else {
        echo "Error: " . $stmt->error; // Manejo de errores
    }

    // Cerrar la conexión
    $stmt->close();
}

$conn->close();
?>
