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
        .pie-pagina {
            padding: 0%;
            width: 100%;
            background-color: #854831;
            margin-top: 20px;
        }
        .pie-pagina .grupo-1 {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 50px;
            padding: 45px 0px;
        }
        .pie-pagina .grupo-1 .box h2 {
            color: #f4abba;
            margin-bottom: 25px;
            font-size: 20px;
        }
        .pie-pagina .grupo-1 .box p {
            color: #efefef;
            margin-bottom: 10px;
        }
        .pie-pagina .grupo-1 .red-social a {
            display: inline-block;
            text-decoration: none;
            width: 45px;
            height: 45px;
            line-height: 45px;
            color: #fff;
            margin-right: 10px;
            background-color: #f4abba;
            text-align: center;
            transition: all 300ms ease;
        }
        .pie-pagina .grupo-1 .red-social a:hover {
            color: aqua;
        }
        .pie-pagina .grupo-2 {
            background-color: #754831;
            padding: 15px 10px;
            text-align: center;
            color: #fff;
        }
        .pie-pagina .grupo-2 small {
            font-size: 15px;
        }

        /* Estilos del formulario de contacto */
        .formulario-contacto {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .formulario-contacto input,
        .formulario-contacto textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        @media screen and (max-width:800px) {
            .pie-pagina .grupo-1 {
                width: 90%;
                grid-template-columns: repeat(1, 1fr);
                grid-gap: 30px;
                padding: 35px 0px;
            }
        }

      

    </style>
</head>
<body>
<header>
        <div class="header-left">
            <img class="logo" src="img/logo.png"   alt="logo">
            <div class="header-info">
                <h1>TENTACIONES HELADAS</h1>
                <div class="nav-links">
                    <div class="dropdown">
                        <a href="#">Productos</a>
                        <ul class="dropdown-content">
                            <li><a href="productos/helados.php">Helados</a></li>
                            <li><a href="productos/tortas.php">Tortas</a></li>
                            <li><a href="productos/paletas.php">Paletas</a></li>
                            <li><a href="productos/bombones.php">bombones</a></li>
                        </ul>
                    </div>
                   
                    <div class="header-icons">
            <a href="logeo.php" title="Iniciar Sesión">Iniciar Sesión</a>
            
        </div>
                </div>
            </div>
      
                </button>
            </form>
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
                <a href="sabores/Vegano.php"><img class="veganos" src="img/veganos.png" alt="veganos" width="300px"></a>
            </div>
            <div class="f">
                <a href="sabore/Celiacos.php"><img class="celiacos" src="img/celiacos.png" alt="celiacos" width="300px"></a>
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
                        <li><a href="sabores/Vegano.php"><b>VEGANOS</b></a></li>
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

</body>
</html>  