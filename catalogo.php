<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeportiNet - Catálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./cssMain/index-main.css">
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <a class="navbar-brand" href="#">
            <svg width="46" height="46" fill="none" stroke="crimson" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 12a9.969 9.969 0 0 1-2.944 7.087A9.968 9.968 0 0 1 12 22C6.477 22 2 17.523 2 12a9.966 9.966 0 0 1 2.75-6.888A9.972 9.972 0 0 1 12 2a9.969 9.969 0 0 1 7.056 2.913A9.97 9.97 0 0 1 22 12Z"></path>
                <path d="M22 12c-1.459 0-5.484-.55-9.087 1.031C9 14.75 6.166 17.416 4.932 19.073"></path>
                <path d="M8.25 2.727C9.815 4.17 13.23 7.849 14.5 11.5c1.27 3.65 1.74 8.14 2.03 9.417"></path>
                <path d="M2.077 10.75c1.889.114 6.89.217 10.09-1.15 3.2-1.366 5.953-3.88 6.897-4.677"></path>
                <path d="M2.75 15.807a10.038 10.038 0 0 0 4.5 4.995"></path>
                <path d="M2 12a9.966 9.966 0 0 1 2.75-6.888"></path>
                <path d="M12 2a9.972 9.972 0 0 0-7.25 3.112"></path>
                <path d="M16 2.832a10.02 10.02 0 0 1 3.056 2.081A9.97 9.97 0 0 1 22 12a9.98 9.98 0 0 1-.63 3.5"></path>
                <path d="M12 22a9.968 9.968 0 0 0 7.056-2.913"></path>
            </svg>
            DeportiNet
        </a>
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
            <a class="profile" type="button" href="logeo.php">
                Iniciar Sesión
            </a>
        </div>

    </div>

    <!-- Sidebar -->
    <!-- Sidebar -->
<div class="sidebar">
<a href="index.php" >
            <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.5 21V9L2 11l10-8 10 8-2.5-2v12h-15Z"></path>
            <path d="M9.5 14.5V21h5v-6.5h-5Z"></path>
            <path d="M4.5 21h15"></path>
          </svg>Inicio</a>
        <a href="catalogo.php" >
            <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.5 21a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
                <path d="M4.5 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
                <path d="M4.5 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
                <path d="M10.5 12h11"></path>
                <path d="M10.5 19h11"></path>
                <path d="M10.5 5h11"></path>
              </svg>Catálogo</a>
        <div class="diagonal-block block1"></div>
        <div class="diagonal-block block2"></div>
        <div class="diagonal-block block3"></div>
    </div>
</div>

    <!-- Contenedor Principal -->
    <div class="main-content">
        <div class="sub-content">
            <div class="sub-navbar">
                <p>Catálogo</p>
            </div>
            <div class="list-sub-navbar">
                <p>Producto</p>
                <p>Descripción</p>
                <p>Precio</p>
                <p>Categoría</p>
            </div>
        </div>
        

        <!-- Contenido adicional -->
        <div class="contenido">
        <?php
            include 'db.php';
            //back-end
            $query = "SELECT Productos.*, Categorias.nombre_categoria FROM Productos JOIN Categorias ON Productos.id_categoria = Categorias.id_categoria";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='producto'>";
                    echo "<h3>" . $row['nombre'] . "</h3>";
                    echo "<p>" . $row['descripcion'] . "</p>";
                    echo "<p>$" . $row['precio'] . "</p>";
                    echo "<p>" . $row['nombre_categoria'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No hay productos disponibles";
            }
        ?>
        
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        // Inicialización del carrusel
        const carousel = new bootstrap.Carousel('#carouselExample', {
            interval: 3000, // Cambia de imagen cada 3 segundos
            pause: 'hover' // Pausa el carrusel al pasar el mouse sobre él
        });
    </script>
    <script>
        async function searchProducts() {
    const query = document.getElementById('searchInput').value;

    // Llama a la API de búsqueda
    try {
        const response = await fetch(`/search?query=${encodeURIComponent(query)}`);
        const products = await response.json();
        displayResults(products);
    } catch (error) {
        console.error('Error al realizar la búsqueda:', error);
    }
}

function displayResults(products) {
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = ''; // Limpia los resultados anteriores

    // Verifica si hay productos
    if (products.length === 0) {
        resultsDiv.innerText = 'No se encontraron productos.';
        return;
    }

    // Muestra cada producto en la sección de resultados
    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.innerHTML = `<h3>${product.nombre}</h3>
                                <p>${product.descripcion}</p>
                                <p>Precio: $${product.precio.toFixed(2)}</p>`;
        resultsDiv.appendChild(productDiv); // Agrega el producto a la sección de resultados
    });
}
</script>
</body>

</html>
