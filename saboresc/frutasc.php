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
                            <li><a href="productos/helados.php">Helados</a></li>
                            <li><a href="productos/tortas.php">Tortas</a></li>
                            <li><a href="productos/paletas.php">Paletas</a></li>
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
    </body>
    </html>