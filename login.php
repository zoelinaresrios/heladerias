<?php
include('db.php'); // Incluir la conexión a la base de datos

session_start(); // Iniciar sesión

// Verificar si hay un error en la URL
$error = isset($_GET['error']) ? $_GET['error'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Consultar el usuario en la base de datos
    $query = "SELECT * FROM clientes WHERE usuario = '$usuario'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Verificar la contraseña
        if (password_verify($contraseña, $row['contraseña'])) {
            // Almacenar datos del usuario en la sesión
            $_SESSION['user_id'] = $row['ID'];
            $_SESSION['rol'] = $row['rol'];

            // Redirigir según el rol
            if ($row['rol'] == 'administrador') {
                header('Location: admin/index-admin.php');
            } else {
                header('Location: cliente/index-cliente.php');
            }
            exit(); // Detener la ejecución después de redirigir
        } else {
            // Contraseña incorrecta
            header('Location: logeo.php?error=1');
            exit();
        }
    } else {
        // Usuario no encontrado
        header('Location: logeo.php?error=1');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Puedes incluir Bootstrap y otros estilos aquí -->
</head>
<body>
    <div class="contenedor">
        <h1>Iniciar Sesión</h1>
        <?php if ($error == '1'): ?>
            <div style="color: red; text-align: center;">
                Usuario o contraseña incorrectos. Por favor, inténtelo de nuevo.
            </div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
