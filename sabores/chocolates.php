<style> 

.s a{
        text-decoration: none;
        list-style: none;
        color: #000000;
        padding-left: 95px;
    }
    .cajitamm{
        align-items: center;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-gap: 150px;
        margin: 80px;
        text-align: center;
    }
    .cho{
        border-radius: 18px;
        border: 18px solid #f4abba;
        background-color: #f4abba;
        width: 90%;
        height: 100%;
        padding-top: 20px;
        padding-top: 60px;
    }
    .cho{

        text-align: center;
    }
    .desc{
    display: none;
    }
    .cho:hover .desc{
    display: block;}
    .publi{
        border-radius:140px;
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

<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tentaciones Heladas</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
    
                <li class="dropdown">
                    <a href="#">Productos</a>
                    <ul class="dropdown-content">
                        <li><a href="../productos/helados.php">Helados</a></li>
                        <li><a href="../productos/tortas.php">Tortas</a></li>
                        <li><a href="../productos/paletas.php">Paletas</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <body>
     </br>
     <div class=cajitamm>
     <div class="cho"> <h2>Chocolate Amargo</h2><img class="publi" src= "../img/fru.jpeg" height="250px"></br></br> </br><div class="desc">   - Un helado rico y cremoso, elaborado con cacao de alta calidad para un sabor intenso.
     </div></div>
     <div class="cho">Chocolate con Naranja<img class="publi" src="../img/fru.jpeg" height="250px"> </br> <div class="desc">   - Combina el chocolate oscuro con notas cítricas de naranja para una fusión deliciosa.
     </div></div>
     <div class="cho">Chocolate Blanco y Frambuesa<img class="publi" src="../img/fru.jpeg" height="250px"> </br><div class="desc">   - Fresco y revitalizante, este helado une el chocolate con un toque de menta.
     </div></div>
     <div class="cho">Chocolate al Café<img class="publi" src="../img/fru.jpeg" height="250px"> </br> <div class="desc">   - Un intenso sabor a chocolate con un toque de café, ideal para los amantes del café.
     </div></div>
     <div class="cho">Chocolate con Almendras<img class="publi" src="../img/fru.jpeg" height="250px"> </br> <div class="desc">   - Crema de chocolate con trozos crujientes de almendra, una combinación perfecta.
     </div></div>
     <div class="cho">Chocolate con Sal Marina<img class="publi" src="../img/fru.jpeg" height="250px"> </br> <div class="desc">   - La combinación de chocolate intenso con un toque de sal marina crea un equilibrio perfecto.
     </div></div>

    </div>
    </body>
    </html>