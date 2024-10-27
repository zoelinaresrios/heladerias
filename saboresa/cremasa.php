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
    padding: 0%;
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
    width: 105%;
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
                <a class="grande" href="../admin/index-admin.php">Inicio</a>   </div>
            </div>
      
                </button>
            </form>
        </div>
      
    </header>
    <body>
     </br>
     <div class=cajitamm>
     <div class="cho"><h2>frutilla</h2><img class="publi" src="../img/cr_frutilla.jpeg" height="250px"> </br> <div class="desc">   <h4> - Un helado suave y cremoso que combina la frescura de las frutillas con la suavidad de la crema. Cada cucharada ofrece el equilibrio perfecto entre dulzura y acidez.</h4>
     </div></div>
     <div class="cho"><h2>bananita dolca</h2><img class="publi" src="../img/cr_bananita.jpeg" height="250px"> </br> <div class="desc">   <h4> -  El sabor dulce y nostálgico de la clásica golosina de bananita dolca transformado en helado. Ideal para los amantes de los sabores intensos y divertidos.</h4>
     </div></div>
     <div class="cho"><h2>cafe</h2><img class="publi" src="../img/cr_cafe.jpeg" height="250px"> </br><div class="desc">   <h4> - Un helado que captura la esencia del mejor café. Suave, intenso y con el punto justo de dulzura, este sabor es perfecto para los amantes del café en todas sus formas.</h4>
     </div></div>
     <div class="cho"><h2>moras silvestres</h2><img class="publi" src="../img/cr_moras silvestres.jpeg" height="250px"> </br> <div class="desc">    <h4> - Un helado lleno de sabor a frutas silvestres, donde las moras aportan su característico toque dulce y ligeramente ácido. Refrescante y natural.
</h4>
     </div></div>
     <div class="cho"><h2>oreo</h2><img class="publi" src="../img/cr_oreo.jpeg" height="250px"> </br> <div class="desc">    <h4> - Trozos crujientes de las clásicas galletas Oreo mezcladas en un cremoso helado. Una combinación irresistible de chocolate y crema en cada bocado.</h4>
     </div></div>
     <div class="cho"><h2>sambayon</h2><img class="publi" src="../img/cr_sam.jpeg" height="250px"> </br> <div class="desc">    <h4> - El clásico helado de sambayón con todo su sabor a yema de huevo, vino dulce y un toque de licor. Elegante y lleno de matices, es perfecto para quienes buscan un sabor sofisticado.</h4>
     </div></div>
     <div class="cho"><h2>vainilla </h2><img class="publi" src="../img/cr_vainilla.jpeg" height="250px"> </br> <div class="desc">    <h4> -  El tradicional y querido sabor de vainilla, cremoso y suave. Un clásico que nunca pasa de moda y que combina a la perfección con cualquier otro sabor.</h4>
     </div></div>
     <div class="cho"><h2>matcha</h2><img class="publi" src="../img/cr_matcha.jpeg" height="250px"> </br> <div class="desc">    <h4> - Helado de matcha, con el característico sabor del té verde japonés. Fresco, ligeramente amargo y muy aromático, ideal para quienes buscan un sabor más exótico y saludable.</h4>
     </div></div>
    <div class="cho"><h2>menta</h2><img class="publi" src="../img/cr_menta.jpeg" height="250px"> </br> <div class="desc">   <h4> - Refrescante y suave, este helado de menta ofrece una sensación fresca y ligera en el paladar. Perfecto para quienes buscan algo fresco y diferente.</h4>
     </div></div>
     <div class="cho"><h2>marmolado</h2><img class="publi" src="../img/cr_marmol.jpeg" height="250px"> </br> <div class="desc">    <h4> - Una combinación visualmente atractiva y deliciosa, con franjas de chocolate y vainilla entrelazadas en una mezcla cremosa que satisface a los indecisos entre ambos sabores.</h4>
     </div></div>
     <div class="cho"><h2>vainilla con chocolate</h2><img class="publi" src="../img/cr_vaincho.jpeg" height="250px"> </br> <div class="desc">    <h4> -El equilibrio perfecto entre la suavidad de la vainilla y el intenso sabor del chocolate. Un clásico que nunca falla, ideal para cualquier ocasión.</h4>
     </div></div>
     <div class="cho"><h2>mixta</h2><img class="publi" src="../img/cr_mixta.jpeg" height="250px"> </br> <div class="desc">    <h4> - Una mezcla irresistible de sabores donde la cremosidad de la vainilla se combina con otros sabores variados. Cada cucharada ofrece una experiencia diferente.</h4>
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