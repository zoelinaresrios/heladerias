<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Frecuentes - Tentaciones Heladas</title>
    <style>
        /* Hacer que el cuerpo ocupe toda la altura de la ventana */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Altura mínima de 100% de la ventana */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #854831;
            color: #f4abba;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
        }

        .logo {
            max-width: 10%;
        }

        .header-info h1 {
            margin: 0;
            font-size: 24px;
        }

        .header-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 100%;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 10px;
        }

        .nav-links a {
            color: #f4abba;
            text-decoration: none;
            padding: 5px;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        h2 {
            text-align: center;
            color: #854831;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #854831;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #8e6c49;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f4abba;
        }
        .grande{
    font-size:25px;
}
        .grupo-2 {
            text-align: center;
            margin-top: auto; /* Empujar el footer hacia el fondo */
            background-color: #f4abba; /* Fondo marrón claro */
            color: black;
            padding: 10px 0;
        }

        .grupo-2 small {
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<header>
    <div class="header-left">
        <img class="logo" src="../img/logo.png" alt="logo">
        <div class="header-info">
            <h1>TENTACIONES HELADAS</h1>
            <div class="nav-links">
                <a class="grande" href="index-admin.php">Inicio</a>
            </div>
        </div>
    </div>
</header>

<br><br><br>

<?php
include('../db.php'); 
// Consulta para obtener los clientes más frecuentes solo con rol 'cliente'
$sql = "SELECT c.ID, c.nombre, c.apellido, COUNT(p.cliente_id) AS total_pedidos
        FROM clientes c
        LEFT JOIN pedidos p ON c.ID = p.cliente_id
        WHERE c.rol = 'cliente'  -- Filtrar solo por clientes
        GROUP BY c.ID
        ORDER BY total_pedidos DESC
        LIMIT 10"; // Limitar a los 10 clientes más frecuentes

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Clientes Más Frecuentes</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Total de Pedidos</th></tr>";
    
    // Mostrar los resultados
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellido'] . "</td>";
        echo "<td>" . $row['total_pedidos'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron clientes frecuentes.</p>";
}

// Cerrar la conexión
$conn->close();
?>

<br><br><br>

    <div class="grupo-2">
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
</footer>  

</body>
</html>
