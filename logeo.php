<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro e Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background-image: url(https://cdn.pixabay.com/photo/2022/02/11/14/52/waffles-7007465_1280.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .contenedor {
            text-align: center;
            position: relative;
        }

        .logo-container {
            color: white;
            font-size: 50px;
            margin-bottom: 40px;
        }

        .main {
            width: 500px;
            height: 600px;
            background: #8e6c49;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 5px 20px 50px #4d4d4d;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        #chk {
            display: none;
        }

        .login, .signup {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: transform 0.8s ease-in-out;
            overflow: hidden;
            padding: 20px;
        }

        .login {
            background: #8e6c49;
            color: #fff;
            transform: translateY(0);
        }

        .signup {
            background: #eee;
            transform: translateY(100%);
        }

        label {
            color: #fff;
            font-size: 2.3em;
            display: flex;
            justify-content: center;
            margin: 50px 0;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }

        input {
            width: 80%;
            height: 40px;
            background: #e0dede;
            margin: 10px auto;
            padding: 12px;
            border: none;
            outline: none;
            border-radius: 5px;
            display: block;
            font-size: 1em;
        }

        button {
            width: 80%;
            height: 45px;
            margin: 20px auto;
            display: block;
            color: #854831;
            background: white;
            font-size: 1.1em;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            transition: .3s ease-in-out;
            cursor: pointer;
        }

        button:hover {
            background: dimgrey;
            color: white;
        }

        /* Botones de navegación */
        .nav-buttons {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            display: flex;
            justify-content: space-around;
        }

        .nav-buttons button {
            width: auto;
            background: #fff;
            color: #8e6c49;
            border: 2px solid #8e6c49;
            padding: 10px 20px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .nav-buttons button:hover {
            background: #8e6c49;
            color: #fff;
        }

        /* Botón de registro al final */
        .btn-register {
            position: relative;
            margin-top: auto;
            background: #fff;
            color: #8e6c49;
            border: 2px solid #8e6c49;
            padding: 10px 20px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .btn-register:hover {
            background: #8e6c49;body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    font-family: 'Jost', sans-serif;
    background-image: url(https://cdn.pixabay.com/photo/2022/02/11/14/52/waffles-7007465_1280.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}

.contenedor {
    text-align: center;
    position: relative;
}

.logo-container {
    color: white;
    font-size: 5vw; /* Cambia de 50px a vw */
    margin-bottom: 5%; /* Cambia de 40px a porcentaje */
}

.main {
    width: 90%; /* Cambia de 500px a porcentaje */
    max-width: 500px; /* Limita el ancho máximo */
    height: auto; /* Cambia a auto para adaptarse al contenido */
    background: #8e6c49;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 5px 20px 50px #4d4d4d;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 5%; /* Añade padding para mejor visualización */
}

label {
    color: #fff;
    font-size: 5vw; /* Cambia de 2.3em a vw */
    margin: 5% 0; /* Cambia a porcentaje */
    font-weight: bold;
    cursor: pointer;
    transition: .5s ease-in-out;
}

input {
    width: 80%;
    height: 5vh; /* Cambia de 40px a vh */
    background: #e0dede;
    margin: 2% auto; /* Cambia a porcentaje */
    padding: 2%; /* Cambia a porcentaje */
    border: none;
    outline: none;
    border-radius: 5px;
    font-size: 1em;
}

button {
    width: 80%;
    height: 7vh; /* Cambia de 45px a vh */
    margin: 5% auto; /* Cambia a porcentaje */
    color: #854831;
    background: white;
    font-size: 5vw; /* Cambia a vw para ser más adaptable */
    font-weight: bold;
    border: none;
    border-radius: 5px;
    transition: .3s ease-in-out;
    cursor: pointer;
}

button:hover {
    background: dimgrey;
    color: white;
}

.nav-buttons {
    position: absolute;
    top: 5%; /* Cambia de 20px a porcentaje */
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    display: flex;
    justify-content: space-around;
}

.nav-buttons button {
    background: #fff;
    color: #8e6c49;
    border: 2px solid #8e6c49;
    padding: 2%; /* Cambia a porcentaje */
    cursor: pointer;
    transition: background 0.3s, color 0.3s;
}

.nav-buttons button:hover {
    background: #8e6c49;
    color: #fff;
}

.btn-register {
    margin-top: auto;
    background: #fff;
    color: #8e6c49;
    border: 2px solid #8e6c49;
    padding: 2%; /* Cambia a porcentaje */
    cursor: pointer;
    transition: background 0.3s, color 0.3s;
}

.btn-register:hover {
    background: #8e6c49;
    color: #fff;
}
            color: #fff;
        }

        #chk:checked ~ .signup {
            transform: translateY(0);
        }

        #chk:checked ~ .login {
            transform: translateY(-100%);
        }

        #chk:checked ~ .signup label {
            color: #854831;
            transform: scale(1);
        }

        #chk:checked ~ .login label {
            transform: scale(.6);
        }
    </style>
</head>
<body>

<div class="contenedor">
    <div class="logo-container">
      
    </div>
    <div class="main">

        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="nav-buttons">
            <button onclick="document.getElementById('chk').checked = false;">Iniciar Sesión</button>
            <button onclick="document.getElementById('chk').checked = true;">Registrarse</button>
        </div>

        <!-- Formulario de Inicio de Sesión -->
        <div class="login">
            <form action="./views/cliente/index-cliente.php" method="post">
                <label for="chk" aria-hidden="true">Iniciar Sesión</label>
                <input type="text" id="usuario-login" name="usuario" placeholder="Usuario" required>
                <input type="password" id="contraseña-login" name="contraseña" placeholder="Contraseña" required>
                <button type="submit">Entrar</button>
                <button type="button" class="btn-register" onclick="document.getElementById('chk').checked = true;">¿No tienes cuenta? Regístrate</button>
            </form>
        </div>

        <!-- Formulario de Registro -->
        <div class="signup">
        <form action="register.php" method="post">
    <label for="chk" aria-hidden="true">Crear Usuario</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
    <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>
    <input type="text" id="telefono" name="telefono" placeholder="Teléfono" required>
    <input type="text" id="direccion" name="direccion" placeholder="Dirección" required>
    <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
    <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
</form>

        </div>
    </div>
</div>

</body>
</html>
