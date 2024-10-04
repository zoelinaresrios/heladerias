<?php
include 'db.php'; // Incluye el archivo de conexión a la base de datos

// Verificar que se han enviado datos del formulario
if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['contraseña'], $_POST['telefono'], $_POST['direccion'], $_POST['usuario'])) {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO Clientes (nombre, apellido, email, contraseña, 	telefono, direccion, rol) 
            VALUES (?, ?, ?, ?, ?, ?, 'cliente')";  // Asignar el rol de cliente por defecto
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param("ssssss", $nombre, $apellido, $email, $contraseña, $telefono, $direccion);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("Location: index.php"); // Redirigir a la página principal después del registro exitoso
        exit();
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>