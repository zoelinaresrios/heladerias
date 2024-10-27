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

    // Preparar la consulta para verificar si el correo electrónico ya está registrado
    $checkEmailQuery = $conn->prepare("SELECT * FROM clientes WHERE email = ?");
    $checkEmailQuery->bind_param("s", $email);
    $checkEmailQuery->execute();
    $result = $checkEmailQuery->get_result();

    if ($result->num_rows > 0) {
        // El correo ya está registrado
        echo "<script>
                alert('El correo electrónico ya está registrado. Por favor, use otro correo.');
                window.location.href = 'logeo.php';
              </script>";
        exit();
    }

    // Preparar la consulta para insertar un nuevo usuario
    $insertQuery = $conn->prepare("INSERT INTO clientes (nombre, apellido, email, usuario, contraseña, telefono, direccion, rol) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $insertQuery->bind_param("sssssiss", $nombre, $apellido, $email, $usuario, $contraseña, $telefono, $direccion, $rol);

    if ($insertQuery->execute()) {
        // Registro exitoso, redirigir al login
        header('Location: cliente/index-cliente.php');
        exit(); // Detener la ejecución del script después de la redirección
    } else {
        echo "Error: " . $insertQuery->error;
    }
}
?>
