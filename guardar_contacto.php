<?php
// Incluir archivo de conexión a la base de datos
include 'db.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO contacto (nombre, email, mensaje) VALUES (?, ?, ?)";
    
    // Preparar la consulta usando mysqli
    if ($stmt = $conn->prepare($sql)) {
        // Vincular parámetros
        $stmt->bind_param("sss", $nombre, $email, $mensaje);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "¡Mensaje enviado con éxito!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    }

    // Cerrar la conexión
    $conn->close();
}
?>
