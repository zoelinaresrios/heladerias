<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas - Tentaciones Heladas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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

        h2 {
            text-align: center;
            color: #854831;
        }

        .chart-container {
            width: 80%;
            margin: auto;
        }

        .grupo-2 {
            text-align: center;
            margin-top: auto;
            background-color: #f4abba;
            color: black;
            padding: 10px 0;
        }

        .grupo-2 small {
            font-size: 0.9em;
        }
        .grande{
    font-size:25px;
}
  
 
            .header-info h1 {
                margin: 0;
                font-size: 24px;
            }
            .header-info {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centrar elementos hijos horizontalmente */
    text-align: center; /* Centrar el texto dentro del contenedor */
    width: 100%; /* Asegúrate de que ocupe el ancho completo */
}
.header-icons{
    display: flex;
    flex-direction: column;
    align-items: center; /* Centrar elementos hijos horizontalmente */
    text-align: center; /* Centrar el texto dentro del contenedor */
  
}
.grande{
    font-size:25px;
}
  
   
.dropdown {
                position: relative;
                display: inline-block;
            }
    
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #8e6c49;
                top: 100%;
                left: 0;
                list-style: none;
                padding: 0;
                margin: 0;
                min-width: 150px;
                z-index: 1;
            }
    
            .dropdown-content li {
                border-bottom: 1px solid #555;
            }
    
            .dropdown-content li a {
                padding: 10px;
                color: #fff;
                text-decoration: none;
                display: block;
            }
    
            .dropdown-content li a:hover {
                background-color: #8e6c;
            }
    
            .dropdown:hover .dropdown-content {
                display: block;
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
    
            .dropdown {
                position: relative;
                display: inline-block;
            }
    
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #8e6c49;
                top: 100%;
                left: 0;
                list-style: none;
                padding: 0;
                margin: 0;
                min-width: 150px;
                z-index: 1;
            }
    
            .dropdown-content li {
                border-bottom: 1px solid #555;
            }
    
            .dropdown-content li a {
                padding: 10px;
                color: #fff;
                text-decoration: none;
                display: block;
            }
    
            .dropdown-content li a:hover {
                background-color: #8e6c;
            }
    
            .dropdown:hover .dropdown-content {
                display: block;
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

// Consulta para obtener los productos más vendidos
$sql = "SELECT p.ID, p.nombre, SUM(dp.cantidad) AS total_vendidos
        FROM productos p
        LEFT JOIN detalle_pedido dp ON p.ID = dp.producto_id
        GROUP BY p.ID
        ORDER BY total_vendidos DESC
        LIMIT 10"; // Limitar a los 10 productos más vendidos

$result = $conn->query($sql);

$productos = [];
$ventas = [];

if ($result->num_rows > 0) {
    // Almacenar los productos y sus ventas
    while($row = $result->fetch_assoc()) {
        $productos[] = $row['nombre'];
        $ventas[] = $row['total_vendidos'];
    }
} else {
    echo "<p>No se encontraron productos vendidos.</p>";
}

// Cerrar la conexión
$conn->close();
?>

<h2>Productos Más Vendidos</h2>
<div class="chart-container">
    <canvas id="productosVendidosChart"></canvas>
</div>

<script>
    const ctx = document.getElementById('productosVendidosChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar', // Cambiar a 'bar', 'line', etc. según el tipo de gráfico deseado
        data: {
            labels: <?php echo json_encode($productos); ?>, // Los nombres de los productos
            datasets: [{
                label: 'Total Vendidos',
                data: <?php echo json_encode($ventas); ?>, // Las cantidades vendidas
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Iniciar el eje Y en cero
                }
            }
        }
    });
</script>

<br><br><br>
<footer>
    <div class="grupo-2">
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
</footer>  

</body>
</html>
