<style> 

.s a{
        text-decoration: none;
        list-style: none;
        color: #000000;
        padding-left: 95px;
    }
    .cajitamm {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Adaptable a la pantalla */
    grid-gap: 110px;
    margin: 50px auto; /* Centrar el contenedor */
    text-align: center;
    max-width: 1200px; /* Ancho máximo del contenedor */
    padding: 10px 20px; /* Espaciado interno a los lados */
}

.cho {
    border-radius: 18px;
    border: 6px solid #f4abba;
    background-color: #f4abba;
    padding: 40px 15px; 
    margin: auto; /* Asegura que la caja esté centrada dentro del contenedor */
    width: 100%; /* Ajustar al 100% del ancho de la celda del grid */
    height: auto; 
    text-align: center;
}

.publi {
    border-radius: 70%;
    margin-bottom: 20px; /* Espacio entre imagen y descripción */
}
.desc {
    display: none; /* Oculta el texto inicialmente */
    opacity: 0; /* Comienza con opacidad 0 */
    transition: opacity 0.3s ease; /* Transición suave para la opacidad */
}

.cho:hover .desc {
    display: block; /* Muestra el texto al pasar el cursor */
    opacity: 1; /* Cambia la opacidad a 1 para que sea visible */
}



    h2{
    
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
                max-width: 100px;
            }
    
            .header-info {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centrar elementos hijos horizontalmente */
    text-align: center; /* Centrar el texto dentro del contenedor */
    width: 100%; /* Asegúrate de que ocupe el ancho completo */
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

<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tentaciones Heladas</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <div class="header-left">
            <img class="logo" src="../img/logo.png" alt="logo">
            <div class="header-info">
                <h1>TENTACIONES HELADAS</h1>
                <div class="nav-links">
                    <div class="dropdown">
                        <a href="#">Productos</a>
                        <ul class="dropdown-content">
                        <li><a href="../productos/helados.php">Helados</a></li>
                            <li><a href="../productos/tortas.php">Tortas</a></li>
                            <li><a href="../productos/paletas.php">Paletas</a></li>
                            <li><a href="../productos/bombones.php">Bombones</a></li>
                        </ul>
                    </div>
                    <a href="../index.php">Inicio</a>
                    <a href="contacto.html">Contacto</a>
                </div>
            </div>
      
                </button>
            </form>
        </div>
      
    </header>
    <body>
     </br>
     <div class=cajitamm>
     <div class="cho"><h2>anana</h2><img class="publi" src="../img/fr_anana.jpeg" height="250px"> </br> <div class="desc">   <h4> - Un bocado refrescante de jugosa piña, con el equilibrio perfecto entre dulzura tropical y acidez vibrante.</h4>
     </div></div>
     <div class="cho"><h2>arandanos</h2><img class="publi" src="../img/fr_arandanos.jpeg" height="250px"> </br> <div class="desc">   <h4> -  Pequeñas joyas de sabor intenso que estallan en tu boca con cada cucharada. El toque ideal de frescura.</h4>
     </div></div>
     <div class="cho"><h2>durazno</h2><img class="publi" src="../img/fr_durazno.jpeg" height="250px"> </br><div class="desc">   <h4> - El auténtico sabor de los duraznos más jugosos y maduros, capturando el verano en cada bocado.</h4>
     </div></div>
     <div class="cho"><h2>frambuesas</h2><img class="publi" src="../img/fr_frambuesaa.jpeg" height="250px"> </br> <div class="desc">    <h4> - Un estallido de sabor ácido y dulce que te lleva directo a una tarde cálida en el campo.</h4>
     </div></div>
     <div class="cho"><h2>limon con miel</h2><img class="publi" src="../img/fr_limmiel.jpeg" height="250px"> </br> <div class="desc">    <h4> - La acidez refrescante del limón, suavizada con el dulzor natural de la miel, creando un equilibrio que deleita.</h4>
     </div></div>
     <div class="cho"><h2>mango</h2><img class="publi" src="../img/fr_mango.jpeg" height="250px"> </br> <div class="desc">    <h4> - Un viaje tropical de sabores exóticos y cremosos que seduce tus papilas gustativas desde el primer momento.</h4>
     </div></div>
     <div class="cho"><h2>melon </h2><img class="publi" src="../img/fr_melon.jpeg" height="250px"> </br> <div class="desc">    <h4> -  Tan fresco y delicado como una tarde de verano, el sabor del melón te envuelve en una brisa dulce.</h4>
     </div></div>
     <div class="cho"><h2>fresa</h2><img class="publi" src="../img/fr_fresa.jpeg" height="250px"> </br> <div class="desc">    <h4> - El clásico sabor de las fresas frescas y dulces, con la textura perfecta para derretirse en tu boca.</h4>
     </div></div>
    <div class="cho"><h2>naranja</h2><img class="publi" src="../img/fr_naranja.jpeg" height="250px"> </br> <div class="desc">   <h4> - Un torbellino cítrico lleno de energía que te despierta con cada cucharada.</h4>
     </div></div>
     <div class="cho"><h2>manzana</h2><img class="publi" src="../img/fr_manz.jpeg" height="250px"> </br> <div class="desc">    <h4> - Frescura crujiente en cada bocado, como morder una manzana madura bajo el sol.</h4>
     </div></div>
     <div class="cho"><h2>frambuesa</h2><img class="publi" src="../img/fr_frambuesa.jpeg" height="250px"> </br> <div class="desc">    <h4> - Un bocado refrescante de jugosa piña, con el equilibrio perfecto entre dulzura tropical y acidez vibrante.</h4>
     </div></div>
     <div class="cho"><h2>sandia</h2><img class="publi" src="../img/fr_sandia.jpeg" height="250px"> </br> <div class="desc">    <h4> - Pura frescura y dulzura en cada bocado, como si tomaras un trozo de verano eterno.</h4>
     </div></div>
   
    </div>

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