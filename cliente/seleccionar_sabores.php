<?php
include '../db.php'; // Asegúrate de que la ruta a db.php sea correcta

// Verifica si se recibió el producto_id
if (isset($_GET['producto_id'])) {
    $producto_id = $_GET['producto_id'];

    // Consulta para obtener los detalles del producto
    $query_producto = "SELECT nombre, precio FROM productos WHERE id = $producto_id";
    $result_producto = $conn->query($query_producto);

    if ($result_producto->num_rows > 0) {
        $producto = $result_producto->fetch_assoc();
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Seleccionar Sabores - " . htmlspecialchars($producto['nombre']) . "</title>






            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4abba;
                    color: #854831;
                    margin: 0;
                    padding: 20px;
                }
              
                h1 {
                    text-align: center;
                    margin-top: 20px;
                }
                .buttons-container {
                    text-align: center;
                    margin: 20px 0;
                }
                .buttons-container button {
                    background-color: #854831;
                    color: #f4abba;
                    border: none;
                    border-radius: 5px;
                    padding: 10px 15px;
                    margin: 0 5px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                }
                .buttons-container button:hover {
                    background-color: #d99a8e; /* Cambio de color al pasar el mouse */
                }
                form {
                    max-width: 600px;
                    margin: auto;
                    padding: 20px;
                    border: 2px solid #854831;
                    border-radius: 10px;
                    background-color: #ffffff;
                }
                label {
                    font-weight: bold;
                }
                .sabor {
                    margin: 10px 0;
                }
                .select-button {
                    background-color: #854831;
                    color: #f4abba;
                    border: none;
                    border-radius: 5px;
                    padding: 10px 15px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                    display: block;
                    margin-top: 20px;
                    width: 100%;
                }
                .select-button:hover {
                    background-color: #d99a8e; /* Cambio de color al pasar el mouse */
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
            
       
            .grande{
    font-size:25px;
}
  
  .pie-pagina {
    background-color: #854831; /* Fondo en tono marrón claro */
    padding: 0%;
    color: #FFFFFF; /* Texto marrón oscuro */
}

.grupo-1 {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: auto;
    padding-right: 50px;
    font-size:15px;
}

.box {
    width: 30%;
    text-align: left;
    padding-left: 70px;
}

.box h2 {
    font-size: 1.5em;
    color: #f4abba; /* Color rosa */
    margin-bottom: 10px;
}

.box p, .box a {
    font-size: 1em;
    color: ##FFFFFF; /* Marrón oscuro */
}

.box a {
    text-decoration: none;
    color: #f4abba; /* Enlaces en rosa */
}

.contact-form {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Espacio entre campos */
}

.contact-form label {
    font-size: 1em;
    color: ##FFFFFF; /* Marrón oscuro */
}

.contact-form input, .contact-form textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #ff0099; /* Bordes en rosa */
    border-radius: 8px; /* Bordes redondeados */
    font-size: 1em;
    background-color: #fef5f9; /* Fondo claro */
    color: #5d4037; /* Texto marrón oscuro */
}

.contact-form input:focus, .contact-form textarea:focus {
    outline: none;
    border-color: #a65380; /* Cambio de color al enfocar */
}

.contact-form button {
    background-color: #ff0099; /* Fondo del botón rosa */
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.1em;
    transition: background-color 0.3s ease;
    width: 105%;
}

.contact-form button:hover {
    background-color: #a65380; /* Rosa oscuro al pasar el mouse */
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
        <body>";

    
        echo "<header>
            <div class='header-left'>
                <img class='logo' src='../img/logo.png'  alt='logo'>
                <div class='header-info'>
                    <h1>TENTACIONES HELADAS</h1>
                    <div class='nav-links' class='dropdown'>
                    <a  class='grande' href='.index-cliente.php'>Inicio</a>

                       <a class='grande' href='helados_clientes.php'>Productos</a

           
                        </div>
           
              </header>";

        echo "<h1>Seleccionar Sabores para " . htmlspecialchars($producto['nombre']) . "</h1>";
        echo "<p style='text-align: center;'>Precio: $" . htmlspecialchars($producto['precio']) . "</p>";

        // Variable para el número de sabores seleccionables
        $num_sabores_seleccionables = 4;

        echo "<div class='buttons-container'>";
        for ($i = 1; $i <= $num_sabores_seleccionables; $i++) {
            echo "<button class='select-count' data-count='$i'>$i</button>";
        }
        echo "</div>";

        echo "<form action='agregar_al_carrito.php' method='POST' id='saboresForm'>";
        echo "<h3>Elige hasta $num_sabores_seleccionables sabores:</h3>";

        // Consulta para obtener los sabores
        $query_sabores = "SELECT id, nombre FROM sabores"; 
        $result_sabores = $conn->query($query_sabores);

        if ($result_sabores->num_rows > 0) {
            echo "<div id='sabores-container'>";
            while ($row = $result_sabores->fetch_assoc()) {
                echo "<div class='sabor' data-id='" . $row['id'] . "'>";
                echo "<span>" . htmlspecialchars($row['nombre']) . "</span>";
                echo "<input type='checkbox' name='sabores[]' value='" . $row['id'] . "'> Seleccionar<br>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "No se encontraron sabores.";
        }

        // Campo oculto para el producto
        echo "<input type='hidden' name='producto_id' value='" . $producto_id . "'>";

        // Botón para agregar al carrito
        echo "<button type='submit' class='select-button'>Agregar al Carrito</button>";
        echo "</form>";

        // Agregar el script para validar selección
        echo "<script>
                const saborCheckboxes = document.querySelectorAll('input[name=\"sabores[]\"]');
                const numSaboresMax = $num_sabores_seleccionables;
                const saboresForm = document.getElementById('saboresForm');

                document.querySelectorAll('.select-count').forEach(button => {
                    button.addEventListener('click', function() {
                        const count = parseInt(this.getAttribute('data-count'));
                        saborCheckboxes.forEach((checkbox, index) => {
                            checkbox.checked = false; // Reinicia la selección
                            if (index < count) {
                                checkbox.disabled = false; // Habilita el checkbox
                            } else {
                                checkbox.disabled = true; // Deshabilita el checkbox
                            }
                        });
                    });
                });

                saboresForm.addEventListener('submit', function(event) {
                    const selectedCount = Array.from(saborCheckboxes).filter(checkbox => checkbox.checked).length;
                    if (selectedCount > numSaboresMax) {
                        alert('Debes seleccionar hasta ' + numSaboresMax + ' sabores.');
                        event.preventDefault();
                    }
                });
              </script>";

        // Footer
        echo " <br> <footer class='pie-pagina'>
                  <div class='grupo-1'>
        <div class='box'>
            <h2>Calidad del Producto</h2>
            <p>En Tentaciones Heladas, nos dedicamos a ofrecerte helados artesanales de la más alta calidad. <br><br>
                Utilizamos ingredientes frescos y naturales, seleccionados cuidadosamente para garantizar que 
                cada bocado sea una experiencia deliciosa y satisfactoria. <br> <br>¡Déjate llevar por la 
                frescura y la calidad que solo Tentaciones Heladas puede ofrecer!</p>
        </div>
        <div class='box'>
            <h2>Contacto</h2>
            <p>Teléfono: 123-456-7890</p>
            <p>Email: @tentacionesheladass.gmail.com</p>
            <a href='https://www.instagram.com/tentacionesheladass/?hl=es'>Instagram</a>
        </div>
        <div class='box'>
            <h2>Contáctanos</h2>
            <form action='../guardar_contacto.php' method='POST' class='contact-form'>
                <label for='nombre'>Nombre </label>
                <input type='text' id='nombre' name='nombre' required placeholder='Tu nombre'>

                <label for='email'>Email </label>
                <input type='email' id='email' name='email' required placeholder='Tu email'>

                <label for='mensaje'>Mensaje </label>
                <textarea id='mensaje' name='mensaje' required placeholder='Tu mensaje'></textarea>

                <button type='submit'>ENVIAR</button>
            </form>
        </div>
    </div>
    <div class='grupo-2'>
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
              </footer>";
        
        echo "</body></html>";
    } else {
        echo "Producto no encontrado.";
    }
} else {
    echo "No se recibió el ID del producto.";
}
?>
