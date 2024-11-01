<style>    
.s5 a{
        text-decoration: none;
        list-style: none;
        color: #000000;
        padding-left: 95px;
    }
    .cajitamm{
        align-items: center;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-gap: 60px;
        margin: 75px;
        text-align: center;
    }
    .cho{
        border-radius: 8px;
        border: 5px solid #f4abba;
        background-color: #f4abba;
    }
    .cho{
        text-align: center;
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
</style>

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
.grande{
    font-size:25px;
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
  

    .pie-pagina {
    background-color: #854831; /* Fondo en tono marrón claro */
    padding: 0%;
    color: #FFFFFF; /* Texto marrón oscuro */
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
                
                <a class="grande" href="../admin/index-admin.php">Inicio</a>
                </div>
            </div>
      
      
    </header>
    <body>
     </br>
     <div class=cajitamm>
     <div class="cho"><h2>brownie</h2><img class="publi" src="../img/brownie.jpeg" height="250px"> </br> <div class="desc">   - Combina el chocolate oscuro con notas cítricas de naranja para una fusión deliciosa.
     </div></div>
     <div class="cho"><h2>chocolate cadbury</h2><img class="publi" src="../img/cr_ cadbury.jpeg" height="250px"> </br> <div class="desc">   - Combina el chocolate oscuro con notas cítricas de naranja para una fusión deliciosa.
     </div></div>
     <div class="cho"><h2>crema americana</h2><img class="publi" src="../img/cr_americana.jpeg" height="250px"> </br><div class="desc">   - Fresco y revitalizante, este helado une el chocolate con un toque de menta.
     </div></div>
     <div class="cho"><h2>flan</h2><img class="publi" src="../img/cr_flan.jpeg" height="250px"> </br> <div class="desc">   - Un intenso sabor a chocolate con un toque de café, ideal para los amantes del café.
     </div></div>
     <div class="cho"><h2>chocolate con naranja</h2><img class="publi" src="../img/cho_naranja.jpeg" height="250px"> </br> <div class="desc">   - La combinación de chocolate intenso con un toque de sal marina crea un equilibrio perfecto.
     </div></div>
     <div class="cho"><h2>crema cafe</h2><img class="publi" src="../img/cr_cafe.jpeg" height="250px"> </br> <div class="desc">   - La combinación de chocolate intenso con un toque de sal marina crea un equilibrio perfecto.
     </div></div>
     <div class="cho"><h2>limon</h2><img class="publi" src="../img/fr_limonn.jpeg" height="250px"> </br> <div class="desc">   - Crema de chocolate con trozos crujientes de almendra, una combinación perfecta.
     </div></div>
     <div class="cho"><h2>choco chips</h2><img class="publi" src="../img/fru.jpeg" height="250px"> </br> <div class="desc">   - La combinación de chocolate intenso con un toque de sal marina crea un equilibrio perfecto.
     </div></div>
     <div class="cho"><h2>bananita dolca</h2><img class="publi" src="../img/cr_bananita.jpeg" height="250px"> </br> <div class="desc">   - La combinación de chocolate intenso con un toque de sal marina crea un equilibrio perfecto.
     </div></div>
     
    </div>
    <footer class="pie-pagina">
    <div class="grupo-2">
        <small>&copy; 2024 Tentaciones Heladas - Todos los derechos reservados.</small>
    </div>
</footer>
    </body>
    </html>