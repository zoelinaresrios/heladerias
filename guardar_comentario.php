<?php
// Datos de conexión a la base de datos
$servername = "localhost";  // Usualmente es localhost
$username = "root";         // Tu usuario de MySQL
$password = "";             // Tu contraseña de MySQL
$dbname = "heladeria";      // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mensaje = $_POST['mensaje'];

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO contacto (nombre, apellido, mensaje) VALUES ('$nombre', '$apellido', '$mensaje')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Comentario guardado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>