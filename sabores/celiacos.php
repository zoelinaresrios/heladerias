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
                <li><a href="index.php">Inicio</a></li>
    
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
     </br>
     <div class=cajitamm>
     <div class="cho"><img class="publi" src="img/fru.jpeg" height="250px"> </br> Chocolate</div>
     <div class="cho"><img class="publi" src="img/fru.jpeg" height="250px"> </br> Chocolate</div>
     <div class="cho"><img class="publi" src="img/fru.jpeg" height="250px"> </br> Chocolate</div>
     <div class="cho"><img class="publi" src="img/fru.jpeg" height="250px"> </br> Chocolate</div>
     <div class="cho"><img class="publi" src="img/fru.jpeg" height="250px"> </br> Chocolate</div>
     <div class="cho"><img class="publi" src="img/fru.jpeg" height="250px"> </br> Chocolate</div>
    </div>
    </body>