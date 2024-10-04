<?php
session_start();

// Conexión a la base de datos
$mysqli = new mysqli("localhost", "usuario", "contraseña", "base_de_datos");

if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $stmt = $mysqli->prepare("SELECT contraseña, rol FROM Clientes WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password, $rol);
        $stmt->fetch();

        // Verificar la contraseña
        if (password_verify($contraseña, $hashed_password)) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $rol; // Guardar rol en la sesión
            echo "Login exitoso";
            // Redireccionar o mostrar un mensaje
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

    $stmt->close();
}
$mysqli->close();
?>
