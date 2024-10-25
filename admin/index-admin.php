<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentaciones Heladas</title>

    <style>
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

            .logo {
                max-width: 10%;
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
    width: 100%; /* Asegúrate de que ocupe el ancho completo */
}

.grande{
    font-size:25px;
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
        

        nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

nav ul li {
    position: relative;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    display: block;
}

nav ul li .dropdown-content {
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

nav ul li .dropdown-content li {
    border-bottom: 1px solid #555;
}

nav ul li .dropdown-content li a {
    padding: 10px;
    color: #fff;
}

nav ul li:hover .dropdown-content {
    display: block;
}

nav ul li .dropdown-content li a:hover {
    background-color: #8e6c;
}

        .search-container {
            flex: 2;
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }

        form {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 500px; /* Ajusta el tamaño máximo del campo de búsqueda */
        }

        input[type="search"] {
            border: 2px solid #e6007f; /* Color rosa para la barra de búsqueda */
            border-radius: 5px;
            padding: 8px;
            outline: none;
            color: #333;
            width: 100%;
        }

        input[type="search"]:focus {
            border-color: #d6007f;
        }

        button {
            background-color: #e6007f;
            border: none;
            border-radius: 5px;
            padding: 8px;
            margin-left: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        button svg {
            fill: #fff;
        }

        .header-icons {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: auto;
        }

        .header-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #fff; /* Fondo blanco para el botón */
            color: #000; /* Texto en negro */
            border-radius: 50%;
            border: 2px solid #f4abba; /* Borde rosa para visibilidad */
            text-decoration: none;
            font-size: 18px; /* Tamaño de la letra */
            font-weight: bold;
            text-align: center;
            line-height: 1;
            box-sizing: border-box;
        }

        .header-icons a:hover {
            background-color: #f4abba; /* Cambia el fondo al pasar el ratón */
            color: #000; /* Asegura que el texto siga siendo negro */
        }

        .header-icons a:hover svg {
            filter: none; /* Mantiene el ícono visible en hover */
        }

        main {
            padding: 20px;
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
    margin-left:25%;
    margin-right:25%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap:10%;
    grid-gap: 5%;
    max-width: 100%;
    
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
            .header-left {
                display: flex;
                align-items: center;
                gap: 20px;
                flex: 1;
            }
            .pie-pagina {
    background-color: #854831; /* Fondo en tono marrón claro */
    padding: 20px 0;
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
<body>
    <!-- Encabezado con logo y navegación -->
    <header>
    <div class="header-left">
            <img class="logo" src="../img/logo.png"   alt="logo">
            <div class="header-info">
                <h1>TENTACIONES HELADAS</h1>
                <div class="nav-links">
                    <div class="dropdown">
                        <a class="grande" href="#">Productos</a>
                        <ul class="dropdown-content">
                            <li><a href="productos/helados.php">Helados</a></li>
                            <li><a href="productos/tortas.php">Tortas</a></li>
                            <li><a href="productos/paletas.php">Paletas</a></li>
                            <li><a href="productos/bombones.php">bombones</a></li>
                        </ul>
                    </div>
       

            <a class="grande" href="carrito.php" title="Informes">Informes</a>
        </div>
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
            <a href="../sabores/Chocolates.php"><img class="chocolate" src="../img/chocolate.png" alt="chocolate" width="300px"></a>
        </div>
        <div class="b">
            <a href="../sabores/Frutas.php"><img class="crema" src="../img/crema.png" alt="crema" width="300px"></a>
        </div>
        <div class="c">
            <a href="../sabores/Cremas.php"><img class="cremas" src="../img/cremas.png" alt="cremas" width="300px" ></a>
        </div>
        <div class="s">
            <nav>
                <ul>
                    <li><a href="../sabores/Chocolates.php"><b>CHOCOLATES</b></a></li>
                </ul>
            </nav>
        </div>
        <div class="s1">
            <nav>
                <ul>
                    <li><a href="../sabores/Frutas.php"><b>FRUTAS</b></a></li>
                </ul>
            </nav>
        </div>
        <div class="s2">
            <nav>
                <ul>
                    <li><a href="../sabores/Cremas.php"><b>CREMAS</b></a></li>
                </ul>
            </nav>
        </div>
            <div class="d">
                <a href="../sabores/Especiales.php"><img class="especiales" src="../img/especiales.png" alt="especiales" width="300px"></a>
            </div>
            <div class="e">
                <a href="../sabores/Vegano.php"><img class="veganos" src="../img/veganos.png" alt="veganos" width="300px"></a>
            </div>
            <div class="f">
                <a href="../sabores/Celiacos.php"><img class="celiacos" src="../img/celiacos.png" alt="celiacos" width="300px"></a>
            </div>
            <div class="s3">
                <nav>
                    <ul>
                        <li><a href="../sabores/Especiales.php"><b>ESPECIALES</b></a></li>
                    </ul>
                </nav>
            </div>
            <div class="s4">
                <nav>
                    <ul>
                        <li><a href="../sabores/Vegano.php"><b>VEGANOS</b></a></li>
                    </ul>
                </nav>
            </div>
            <div class="s5">
                <nav>
                    <ul>
                        <li><a href="../sabores/Celiacos.php"><b>CELIACOS</b></a></li>
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