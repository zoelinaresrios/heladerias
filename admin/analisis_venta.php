<?php
include('../db.php');

// Consultas para obtener las ventas
$ventas_diarias = $conn->query("SELECT DATE(fecha_pedido) as fecha, SUM(total) as total_ventas FROM pedidos GROUP BY fecha ORDER BY fecha DESC LIMIT 30");
$ventas_semanales = $conn->query("SELECT DATE(fecha_pedido) as fecha, SUM(total) as total_ventas FROM pedidos WHERE fecha_pedido >= NOW() - INTERVAL 7 DAY GROUP BY fecha ORDER BY fecha");
$ventas_mensuales = $conn->query("SELECT DATE_FORMAT(fecha_pedido, '%Y-%m') as mes, SUM(total) as total_ventas FROM pedidos GROUP BY mes ORDER BY mes DESC LIMIT 12");
$ventas_anuales = $conn->query("SELECT YEAR(fecha_pedido) as anio, SUM(total) as total_ventas FROM pedidos GROUP BY anio ORDER BY anio DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Ventas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2, h3 {
            text-align: center;
        }
        canvas {
            margin: 0 auto;
            display: block;
            max-width: 800px; /* Aumentado el ancho máximo */
            height: 400px; /* Altura fija para todos los gráficos */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            
        


.grupo-2 {
    text-align: center;
    margin-top: 20px;
    background-color: #f4abba; /* Fondo marrón oscuro */
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
            <img class="logo" src="../img/logo.png"   alt="logo">
            <div class="header-info">
                <h1>TENTACIONES HELADAS</h1>
          
                    <div class="nav-links" class="dropdown">
                        <a class="grande" href="index-admin.php">Inicio</a>
                     
                    </div>
       

          
        </div>
    </header>
<br><br><br>





    <h2>Análisis de Ventas</h2>
    
    <h3>Ventas Diarias (Últimos 30 Días)</h3>
    <canvas id="ventasDiarias"></canvas>
    
    <h3>Ventas Semanales</h3>
    <canvas id="ventasSemanales"></canvas>
    
    <h3>Ventas Mensuales</h3>
    <canvas id="ventasMensuales"></canvas>
    
    <h3>Ventas Anuales</h3>
    <canvas id="ventasAnuales"></canvas>

    <script>
        // Ventas Diarias
        const ctxDiarias = document.getElementById('ventasDiarias').getContext('2d');
        const diariasData = {
            labels: [],
            datasets: [{
                label: 'Ventas Diarias ($)',
                data: [],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.4, // Suavizado de línea
            }]
        };

        <?php while($row = $ventas_diarias->fetch_assoc()) { ?>
            diariasData.labels.push('<?php echo $row['fecha']; ?>');
            diariasData.datasets[0].data.push(<?php echo $row['total_ventas']; ?>);
        <?php } ?>

        new Chart(ctxDiarias, {
            type: 'line', // Cambiar a gráfico de líneas
            data: diariasData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Ventas ($)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Fecha'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                    }
                }
            }
        });

        // Ventas Semanales
        const ctxSemanales = document.getElementById('ventasSemanales').getContext('2d');
        const semanalesData = {
            labels: [],
            datasets: [{
                label: 'Ventas Semanales ($)',
                data: [],
                borderColor: 'rgba(153, 102, 255, 1)',
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.4, // Suavizado de línea
            }]
        };

        <?php while($row = $ventas_semanales->fetch_assoc()) { ?>
            semanalesData.labels.push('<?php echo $row['fecha']; ?>');
            semanalesData.datasets[0].data.push(<?php echo $row['total_ventas']; ?>);
        <?php } ?>

        new Chart(ctxSemanales, {
            type: 'line', // Cambiar a gráfico de líneas
            data: semanalesData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Ventas ($)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Fecha'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                    }
                }
            }
        });

        // Ventas Mensuales
        const ctxMensuales = document.getElementById('ventasMensuales').getContext('2d');
        const mensualesData = {
            labels: [],
            datasets: [{
                label: 'Ventas Mensuales ($)',
                data: [],
                borderColor: 'rgba(255, 206, 86, 1)',
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.4, // Suavizado de línea
            }]
        };

        <?php while($row = $ventas_mensuales->fetch_assoc()) { ?>
            mensualesData.labels.push('<?php echo $row['mes']; ?>');
            mensualesData.datasets[0].data.push(<?php echo $row['total_ventas']; ?>);
        <?php } ?>

        new Chart(ctxMensuales, {
            type: 'line', // Cambiar a gráfico de líneas
            data: mensualesData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Ventas ($)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Mes'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                    }
                }
            }
        });

        // Ventas Anuales
        const ctxAnuales = document.getElementById('ventasAnuales').getContext('2d');
        const anualesData = {
            labels: [],
            datasets: [{
                label: 'Ventas Anuales ($)',
                data: [],
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.4, // Suavizado de línea
            }]
        };

        <?php while($row = $ventas_anuales->fetch_assoc()) { ?>
            anualesData.labels.push('<?php echo $row['anio']; ?>');
            anualesData.datasets[0].data.push(<?php echo $row['total_ventas']; ?>);
        <?php } ?>

        new Chart(ctxAnuales, {
            type: 'line', // Cambiar a gráfico de líneas
            data: anualesData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Ventas ($)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Año'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                    }
                }
            }
        });
    </script>
    <br><br><br>


<div class="grupo-2">
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
</footer>  
</body>
</html>
