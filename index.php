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
            flex-grow: 1;
            text-align: center;
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
    grid-gap: 10%;
    padding-right: 25%;
    padding-left: 25%
    max-width: 100%;
    margin: auto;
    margin-left:21%;
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

footer{
    background-color: #854831;
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
    2

    </style>
</head>
<body>
    
    <!-- Encabezado con logo y navegación -->
    <header>
        <div class="header-left">
            <img class="logo" src="../img/logo.png" alt="logo">
            <a href="index-cliente.php">Inicio</a>
        </div>
        <div class="header-info">
            <h1>TENTACIONES HELADAS</h1>
        </div>
        <a href="carrito.php">
            <button class="cart-button">C</button>
        </a>
 
        <div class="header-icons">
            <a href="logeo.php" title="Iniciar Sesión">I</a>
            
        </div>
    </header>


    <main>
    <!-- Carrusel de imágenes -->
    <div class="carrusel">
        <div class="imagenes">
            <img src="img/1.png" alt="Imagen 1" class="activo">
            <img src="img/2.png" alt="Imagen 2">
            <img src="img/3.png" alt="Imagen 3">
        </div>
        <button class="prev">❮</button>
        <button class="next">❯</button>
    </div>

    <div class="cajon">
        <!-- Contenido (sin cambios) -->
    </div>
    
    <footer> </footer>

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
            <a href="sabores/Chocolates.php"><img class="chocolate" src="img/chocolate.png" alt="chocolate" width="300px"></a>
        </div>
        <div class="b">
            <a href="sabores/Frutas.php"><img class="crema" src="img/crema.png" alt="crema" width="300px"></a>
        </div>
        <div class="c">
            <a href="sabores/Cremas.php"><img class="cremas" src="img/cremas.png" alt="cremas" width="300px" ></a>
        </div>
        <div class="s">
            <nav>
                <ul>
                    <li><a href="sabores/Chocolates.php"><b>CHOCOLATES</b></a></li>
                </ul>
            </nav>
        </div>
        <div class="s1">
            <nav>
                <ul>
                    <li><a href="sabores/Frutas.php"><b>FRUTAS</b></a></li>
                </ul>
            </nav>
        </div>
        <div class="s2">
            <nav>
                <ul>
                    <li><a href="sabores/Cremas.php"><b>CREMAS</b></a></li>
                </ul>
            </nav>
        </div>
            <div class="d">
                <a href="sabores/Especiales.php"><img class="especiales" src="img/especiales.png" alt="especiales" width="300px"></a>
            </div>
            <div class="e">
                <a href="sabores/diabeticos.php"><img class="veganos" src="img/veganos.png" alt="veganos" width="300px"></a>
            </div>
            <div class="f">
                <a href="sabores/Celiacos.php"><img class="celiacos" src="img/celiacos.png" alt="celiacos" width="300px"></a>
            </div>
            <div class="s3">
                <nav>
                    <ul>
                        <li><a href="sabores/Especiales.php"><b>ESPECIALES</b></a></li>
                    </ul>
                </nav>
            </div>
            <div class="s4">
                <nav>
                    <ul>
                        <li><a href="sabores/diabeticos.php"><b>DIABETICOS</b></a></li>
                    </ul>
                </nav>
            </div>
            <div class="s5">
                <nav>
                    <ul>
                        <li><a href="sabores/Celiacos.php"><b>CELIACOS</b></a></li>
                    </ul>
                </nav>
            </div>
    </div>
    <footer> </footer>
</body>
</html>  