<?php
include('../db.php'); // Asegúrate de que la ruta sea correcta

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Iniciar una transacción para evitar datos inconsistentes en caso de error
    $conn->begin_transaction();

    try {
        // Primero elimina los registros relacionados en detalle_pedido
        $stmtDetalle = $conn->prepare("DELETE FROM detalle_pedido WHERE producto_id = ?");
        $stmtDetalle->bind_param("i", $id);
        $stmtDetalle->execute();
        $stmtDetalle->close();

        // Luego elimina el producto en la tabla productos
        $stmtProducto = $conn->prepare("DELETE FROM productos WHERE ID = ?");
        $stmtProducto->bind_param("i", $id);
        $stmtProducto->execute();
        $stmtProducto->close();

        // Si todo es exitoso, confirmamos la transacción
        $conn->commit();
        
        $mensaje = "Producto y registros asociados eliminados exitosamente.";
    } catch (mysqli_sql_exception $exception) {
        // Si algo falla, revertimos todos los cambios realizados en la transacción
        $conn->rollback();
        $mensaje = "Error al eliminar el producto y sus registros: " . $exception->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto - Tentaciones Heladas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #854831;
        }
        p {
            color: #333;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: #ffffff;
            background-color: #854831;
            border-radius: 5px;
            text-decoration: none;
        }
        a:hover {
            background-color: #f4abba;
            color: #854831;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Resultado</h1>
    <p><?php echo isset($mensaje) ? $mensaje : ''; ?></p>
    <a href="productos-admin.php">Regresar a la gestión de productos</a>
</div>

</body>
</html>
