<?php
include 'db.php'; // Incluye el archivo de conexión a la base de datos

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Preparar y ejecutar la consulta de selección
$sql = "SELECT contraseña FROM cliente WHERE usuario='$usuario'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Verificar la contraseña
    if ($contraseña === $row['contraseña']) {
        echo "Inicio de sesión exitoso";
        // Aquí puedes redirigir al usuario a una página de bienvenida o a su panel de usuario
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>
