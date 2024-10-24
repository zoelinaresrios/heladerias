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

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
        }

        .logo {
            max-width: 100px;
        }

        .header-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .header-info h1 {
            margin: 0;
            font-size: 24px;
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
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap:10%;
    grid-gap: 5%;
    padding-right: 25%;
    padding-left: 25%
    max-width: 100%;
    margin: auto;
    margin-left:25%;
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

        button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

    </style>
</head>
<body>
    <!-- Encabezado con logo y navegación -->
    <header>
        <div class="header-left">
            <img class="logo" src="../img/logo.png" alt="logo">
            <div class="header-info">
                <h1>TENTACIONES HELADAS</h1>
                <div class="nav-links">
                    <div class="dropdown">
                        <a href="#">Productos</a>
                        <ul class="dropdown-content">
                            <li><a href="helados_clientes.php">productos</a></li>
                            
                        </ul>
                    </div>
                    <a href="contacto.html">Contacto</a>
                </div>
            </div>
        </div>
        <div class="search-container">
            <form id="form" role="search" action="buscar.php" method="GET">
                <input type="search" id="query" name="q" placeholder="Buscar..." aria-label="Search through site content" required>
                <button type="submit">
                    <svg width="30" height="30" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 19a8.5 8.5 0 1 0 0-17 8.5 8.5 0 0 0 0 17Z"></path>
                        <path d="M13.328 7.172A3.988 3.988 0 0 0 10.5 6a3.988 3.988 0 0 0-2.828 1.172"></path>
                        <path d="m16.61 16.611 4.244 4.243"></path>
                    </svg>
                </button>
            </form>
        </div>
        <div class="header-icons">

          

            <a href="carrito.php" title="Carrito">C</a>
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
</body>
</html>