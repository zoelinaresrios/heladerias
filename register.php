<?php
include('db.php'); // Incluir la conexión a la base de datos con la variable $conn

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Encriptar la contraseña
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    // Rol por defecto será 'cliente'
    $rol = 'cliente';

    // Insertar nuevo usuario en la base de datos usando $conn en lugar de $conexion
    $query = "INSERT INTO clientes (nombre, apellido, email, usuario, contraseña, telefono, direccion, rol) 
              VALUES ('$nombre', '$apellido', '$email', '$usuario', '$contraseña', '$telefono', '$direccion', '$rol')";

    if (mysqli_query($conn, $query)) {
        // Registro exitoso, redirigir al login
        header('Location: cliente/index-cliente.php');
        exit(); // Detener la ejecución del script después de la redirección
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
