<?php
include 'db.php'; // Incluye el archivo de conexión a la base de datos

// Verificar que se han enviado datos del formulario
if (isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['contraseña'], $_POST['telefono'], $_POST['direccion'], $_POST['usuario'])) {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['contraseña'];
    $direccion = $_POST['telefono'];
    $usuario = $_POST['direccion'];
    $contraseña = $_POST['usuario'];

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO clientes (nombre, apellido, email, contraseña, telefono, direccion, usuario) 
            VALUES ('$nombre', '$apellido', '$email', '$contraseña', '$telefono', '$direccion', '$usuario')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");

}

$conn->close();
?>
