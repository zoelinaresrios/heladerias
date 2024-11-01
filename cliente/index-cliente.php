<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentaciones Heladas</title>

    <style>
        .s nav ul li{
            margin:-15%;
    list-style: none;
}
.s1 nav ul li{
    margin:-16%;
    list-style: none;
}
.s2 nav ul li{
    margin:-15%;
    list-style: none;
}
.s3 nav ul li{
    margin:-15%;
    list-style: none;
}
.s4 nav ul li{
    margin:-15%;
    list-style: none;
}
.s5 nav ul li{
    margin:-15%;
    list-style: none;
}

.grande{
    font-size:25px;
}
        body {
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
            
       

        .publicidad {
            display: block;
            margin: 20px auto;
            max-width: 100%;
        }

        main {
    padding: 20px;
}

section {
    margin-bottom: 20px;
}
.cajon{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 12%;
    padding-right: 45%;
    max-width: 100%;
    margin: auto;
    margin-left:22%;
    margin-bottom:5%;
}
.textorosa{
    text-align: center;
    h3{
        color: #ff0099;
    }
}
.s a{
    text-decoration: none;
    list-style: none;
    color: #000000;
    padding-left: 95px;
}
.s1 a{
    text-decoration: none;
    list-style: none;
    color: #000000;
    padding-left: 115px;
}
.s2 a{
    text-decoration: none;
    list-style: none;
    color: #000000;
    padding-left: 115px;
}
.s3 a{
    text-decoration: none;
    list-style: none;
    color: #000000;
    padding-left: 100px;
}
.s4 a{
    text-decoration: none;
    list-style: none;
    color: #000000;
    padding-left: 110px;
}
.s5 a{
    text-decoration: none;
    list-style: none;
    color: #000000;
    padding-left: 110px;
}
.cho{
    border-radius: 8px;
    border: 5px solid #ff0099;
}

        /* CSS para el carrusel */
        .carrusel {
            position: relative;
            max-width: 100%;
            margin: 20px auto;
            overflow: hidden;
        }

        .imagenes {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .imagenes img {
            width: 100%;
            display: none;
        }

        .imagenes img.activo {
            display: block;
        }

        

        .prev {
            left: 10px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .next {
            right: 10px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    header h1{
        
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
.home-button { 
            background-color: #e6007f; 
            border: none; 
            border-radius: 8px; 
            padding: 10px 15px; 
            color: white; 
            cursor: pointer; 
            margin-right:5%;
        }
    </style>
</head>
<body>
<header>
        <div class="header-left">
            <img class="logo" src="../img/logo.png"   alt="logo">
            <div class="header-info">
                <h1>TENTACIONES HELADAS</h1>
                <div class="nav-links">
                    <div class="dropdown">
                        <a class="grande" href="helados_clientes.php">Productos</a>
                
                    </div>
                    <div class="header-icons">
            <a class="grande" href="historial.php" title="historial">Historial</a>
            
        </div>
                    <div class="header-icons">
            <a class="grande" href="carrito.php" title="Carrito">Carrito</a>
            
        </div>
                </div>
            </div>
      
                </button>
            </form>
        </div>
        <button class="home-button" onclick="location.href='../index.php'">Cerrar sesión</button>
    </header>
 


    <main>
    <!-- Carrusel de imágenes -->
    <div class="carrusel">
        <div class="imagenes">
            <img src="../img/1.png" alt="Imagen 1" class="activo">
            <img src="../img/2.png" alt="Imagen 2">
            <img src="../img/3.png" alt="Imagen 3">
        </div>
        <button class="prev">❮</button>
        <button class="next">❯</button>
    </div>

    <div class="cajon">
    
    </div>
    
    <script>
        let indiceImagen = 0; 
        const imagenes = document.querySelectorAll('.imagenes img');
        const totalImagenes = imagenes.length;

        // Función para cambiar la imagen
        function cambiarImagen() { 
            imagenes[indiceImagen].classList.remove('activo'); 
            indiceImagen = (indiceImagen + 1) % totalImagenes; 
            imagenes[indiceImagen].classList.add('activo'); 
        }

        // Cambiar imagen automáticamente cada 7 segundos
        let intervalo = setInterval(cambiarImagen, 7000); 

        // Control manual
        document.querySelector('.next').addEventListener('click', () => {
            clearInterval(intervalo);
            cambiarImagen();
            intervalo = setInterval(cambiarImagen, 7000);
        });

        document.querySelector('.prev').addEventListener('click', () => {
            clearInterval(intervalo);
            imagenes[indiceImagen].classList.remove('activo');
            indiceImagen = (indiceImagen - 1 + totalImagenes) % totalImagenes;
            imagenes[indiceImagen].classList.add('activo');
            intervalo = setInterval(cambiarImagen, 7000);
        });
    </script>
    </main>


    <div class="textorosa">
        <h2>NUESTROS SABORES</h2>
        <h3>¡DESCUBRÍ TU FAVORITO!</h3>
    </div>

    <div class="cajon">
    
        <div class="a">
            <a href="../saboresc/Chocolatesc.php"><img class="chocolate" src="../img/chocolate.png" alt="chocolate" width="300px"></a>
        </div>
        <div class="b">
            <a href="../saboresc/Frutasc.php"><img class="crema" src="../img/crema.png" alt="crema" width="300px"></a>
        </div>
        <div class="c">
            <a href="../saboresc/Cremasc.php"><img class="cremas" src="../img/cremas.png" alt="cremas" width="300px" ></a>
        </div>
        <div class="s">
            <nav>
                <ul>
                    <li><a href="../saboresc/Chocolatesc.php"><b>CHOCOLATES</b></a></li>
                </ul>
            </nav>
        </div>
        <div class="s1">
            <nav>
                <ul>
                    <li><a href="../saboresc/Frutasc.php"><b>FRUTAS</b></a></li>
                </ul>
            </nav>
        </div>
        <div class="s2">
            <nav>
                <ul>
                    <li><a href="../saboresc/Cremasc.php"><b>CREMAS</b></a></li>
                </ul>
            </nav>
        </div>
            <div class="d">
                <a href="../saboresc/Especialesc.php"><img class="especiales" src="../img/especiales.png" alt="especiales" width="300px"></a>
            </div>
            <div class="e">
                <a href="../saboresc/Diabeticosc.php"><img class="Diabeticos" src="../img/veganos.png" alt="Diabeticosc" width="300px"></a>
            </div>
            <div class="f">
                <a href="../saboresc/Celiacosc.php"><img class="celiacos" src="../img/celiacos.png" alt="celiacos" width="300px"></a>
            </div>
            <div class="s3">
                <nav>
                    <ul>
                        <li><a href="../saboresc/Especialesc.php"><b>ESPECIALES</b></a></li>
                    </ul>
                </nav>
            </div>
            <div class="s4">
                <nav>
                    <ul>
                        <li><a href="../saboresc/Diabeticosc.php"><b>DIABETICOS</b></a></li>
                    </ul>
                </nav>
            </div>
            <div class="s5">
                <nav>
                    <ul>
                        <li><a href="../saboresc/Celiacosc.php"><b>CELIACOS</b></a></li>
                    </ul>
                </nav>
            </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <h2>Calidad del Producto</h2>
            <p>En Tentaciones Heladas, nos dedicamos a ofrecerte helados artesanales de la más alta calidad. <br><br>
                Utilizamos ingredientes frescos y naturales, seleccionados cuidadosamente para garantizar que 
                cada bocado sea una experiencia deliciosa y satisfactoria. <br> <br>¡Déjate llevar por la 
                frescura y la calidad que solo Tentaciones Heladas puede ofrecer!</p>
        </div>
        <div class="box">
            <h2>Contacto</h2>
            <p>Teléfono: 123-456-7890</p>
            <p>Email: @tentacionesheladass.gmail.com</p>
            <a href="https://www.instagram.com/tentacionesheladass/?hl=es">Instagram</a>
        </div>
        <div class="box">
            <h2>Contáctanos</h2>
            <form action="guardar_contacto.php" method="POST" class="contact-form">
                <label for="nombre">Nombre </label>
                <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre">

                <label for="email">Email </label>
                <input type="email" id="email" name="email" required placeholder="Tu email">

                <label for="mensaje">Mensaje </label>
                <textarea id="mensaje" name="mensaje" required placeholder="Tu mensaje"></textarea>

                <button type="submit">ENVIAR</button>
            </form>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
</footer>
</body>
</html>  