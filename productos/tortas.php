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

    .contenedor{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        max-width: 1200px;
        margin: 0 auto;
    }
    .torta{
        width: 30%;
        margin-bottom: 20px;
        text-align: center;
    }
    .torta img{
        max-width: 100%;
        height: auto;
        border: 4px solid #4c4c4c;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .torta p{
        margin-top: 10px;
        font-size: 1.1em;
        color:#333;
    }

    #padding-CyD{
        padding-top: 52px;
        padding-bottom: 52px;
    }
    #padding-T{
        padding-top: 48px;
        padding-bottom: 47px;
    }
    #padding-CyD2{
        padding-top: 40px;
        padding-bottom: 40px;
    }
    #padding-L{
        padding-top: 29px;
        padding-bottom: 29px;
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
                        <li><a href="helados.php">Helados</a></li>
                        <li><a href="tortas.php">Tortas</a></li>
                        <li><a href="paletas.php">Paletas</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <body>
     <br>
     <h1>Nuestras tortas</h1>
     <br>
     <div class="contenedor">
     <div class="torta">
        <a href=""><img id="padding-CyD" src="../img/torta_chocolate_dulce_de_leche.jpeg" alt=""></a>
        <p>Torta Chocolate y dulce de leche</p><p>Precio: $5000</p>
     </div>
     <div class="torta">
        <a href=""><img id="padding-T" src="../img/torta_tricolor.jpeg" alt=""></a>
        <p>Torta Tricolor</p><p>Precio: $9000</p>
    </div>
    <div class="torta">
        <a href=""><img src="../img/torta_frutilla.jpeg" alt=""></a>
        <p>Torta de Frutilla</p><p>Precio: $10000</p>
    </div>
    <div class="torta">
        <a href=""><img id="padding-L" src="../img/torta_limon.jpeg" alt=""></a>
        <p>Torta de Limon</p><p>Precio: $6000</p>
    </div>
    <div class="torta">
        <a href=""><img src="../img/torta_oreo.jpeg" alt=""></a>
        <p>Torta Oreo</p><p>Precio: $7000</p>
    </div>
    <div class="torta">
        <a href=""><img id="padding-CyD2" src="../img/torta_chocolate_dulce_de_leche.jpeg" alt=""></a>
        <p>Torta Chocolate y dulce de leche</p><p>Precio: $5000</p>
    </div>
     </div>

    </body>
</html>