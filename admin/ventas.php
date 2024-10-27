
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php
include('../db.php'); 
$historial = mysqli_query($conn, "
    SELECT 
        p.ID AS pedido_id,
        p.fecha_pedido,
        p.total AS total_pedido,
        f.fecha_emision,  -- Cambia 'emisión' a 'emision' si es necesario
        f.total AS total_factura,
        SUM(dp.cantidad) AS cantidad_total,
        SUM(dp.subtotal) AS subtotal_total
    FROM 
        pedidos p
    JOIN 
        detalle_pedido dp ON p.ID = dp.pedido_id
    JOIN 
        facturas f ON p.ID = f.pedido_id
    GROUP BY 
        p.ID, f.fecha_emision
    ORDER BY 
        p.fecha_pedido DESC
");


if ($historial && mysqli_num_rows($historial) > 0) {
    echo "<h2 style='text-align:center; font-family: Arial, sans-serif; color: #333;'>Historial de Ventas</h2>";
    echo "<table style='width: 80%; margin: 20px auto; border-collapse: collapse; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);'>";
    echo "<tr style='background-color: #ffcccb;'>
            <th style='padding: 12px; border: 1px solid #ddd; text-align: left; font-weight: bold; font-family: Arial, sans-serif;'>ID Pedido</th>
            <th style='padding: 12px; border: 1px solid #ddd; text-align: left; font-weight: bold; font-family: Arial, sans-serif;'>Fecha Pedido</th>
            <th style='padding: 12px; border: 1px solid #ddd; text-align: left; font-weight: bold; font-family: Arial, sans-serif;'>Total Pedido</th>
            <th style='padding: 12px; border: 1px solid #ddd; text-align: left; font-weight: bold; font-family: Arial, sans-serif;'>Fecha Factura</th>
            <th style='padding: 12px; border: 1px solid #ddd; text-align: left; font-weight: bold; font-family: Arial, sans-serif;'>Total Factura</th>
            <th style='padding: 12px; border: 1px solid #ddd; text-align: left; font-weight: bold; font-family: Arial, sans-serif;'>Cantidad Total</th>
            <th style='padding: 12px; border: 1px solid #ddd; text-align: left; font-weight: bold; font-family: Arial, sans-serif;'>Subtotal Total</th>
          </tr>";
    
    while ($row = mysqli_fetch_assoc($historial)) {
        echo "<tr style='background-color: #ffffff;'>
                <td style='padding: 10px; border: 1px solid #ddd; font-family: Arial, sans-serif;'>{$row['pedido_id']}</td>
                <td style='padding: 10px; border: 1px solid #ddd; font-family: Arial, sans-serif;'>{$row['fecha_pedido']}</td>
                <td style='padding: 10px; border: 1px solid #ddd; font-family: Arial, sans-serif;'>$" . number_format($row['total_pedido'], 2) . "</td>
                <td style='padding: 10px; border: 1px solid #ddd; font-family: Arial, sans-serif;'>" . (isset($row['fecha_emision']) ? $row['fecha_emision'] : 'No disponible') . "</td>
                <td style='padding: 10px; border: 1px solid #ddd; font-family: Arial, sans-serif;'>$" . number_format($row['total_factura'], 2) . "</td>
                <td style='padding: 10px; border: 1px solid #ddd; font-family: Arial, sans-serif;'>{$row['cantidad_total']}</td>
                <td style='padding: 10px; border: 1px solid #ddd; font-family: Arial, sans-serif;'>$" . number_format($row['subtotal_total'], 2) . "</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "<h3 style='text-align:center; font-family: Arial, sans-serif; color: #999;'>No se encontraron resultados.</h3>";
}

mysqli_close($conn);
?>
<br><br><br>

    <div class="grupo-2">
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
</footer>  
<style>     
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
}</style>
</body>
</html>