<?php
include 'db.php'; // Incluye el archivo de conexión a la base de datos

// Verificar que se han enviado datos del formulario
if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telefono'], $_POST['direccion'], $_POST['usuario'], $_POST['contraseña'])) {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO cliente (nombre, apellido, email, telefono, direccion, usuario, contraseña) 
            VALUES ('$nombre', '$apellido', '$email', '$telefono', '$direccion', '$usuario', '$contraseña')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    echo "Datos del Formulario no recibidos";
}

$conn->close();
?>
