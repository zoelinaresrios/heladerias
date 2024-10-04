<?php
session_start(); // Iniciar la sesión
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contraseñaa'];

    // Preparar la consulta SQL
    $sql = "SELECT id_cliente , email , contraseña, rol FROM clientes WHERE clientes = ?";
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación de la consulta falló
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // La consulta SQL utiliza un parámetro de tipo string, así que "s" es el tipo correcto
    $stmt->bind_param("s", $usuario);

    // Ejecutar la consulta
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $gmail, $contrasenia_encriptada, $rol);
        $stmt->fetch();

        if (password_verify($contrasenia, $contrasenia_encriptada)) {
            // Almacenar los datos del usuario en la sesión
            $_SESSION['id_clientes'] = $id;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['email'] = $email;
            $_SESSION['rol'] = $rol;

            // Redirigir al usuario según su rol
            if ($rol === 'cliente') {
                header("Location: ./views/cliente/index-cliente.php");
            } elseif ($rol === 'admin') {
                header("Location: ./views/jefe/index-jefe.php");
            } else {
                echo "Rol no reconocido.";
            }
            exit();
        } else {
            echo "Usuario o contrasenia incorrectos.";
        }
    } else {
        echo "Usuario o contrasenia incorrectos.";
    }

    $stmt->close();
}

$conn->close();
?>
