<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/css usuario/estilos_crear_usuario.css') }}">
    <link rel="shortcut icon" href="{{asset('img/icono.png')}}" type="image/x-icon">
    <title>Crear cuenta</title>
</head>

<body>
    <div id="contenedor">
        <div id="central">
            <div id="register">
                <div class="titulo">
                    Bienvenido
                </div>
                <form id="registerform" action="{{ route('crear_usuario') }}" method="POST">

                    @csrf

                    <input type="text" name="name" placeholder="Indicanos tu nombre" required>

                    <input type="email" name="email" placeholder="Igresa tu correo electronico" required>

                    <input type="password" placeholder="Indica tu contraseña" name="password" required>

                    <button type="submit" title="Registrar" name="Registrar">Crear Cuenta</button>

                </form>
                <div class="pie-form">
                    <a href="{{ route('vista_login_usuario') }}">¿Ya tienes cuenta? Accede ahora</a>
                    <a href="{{ route('index.pokemones') }}">INICIO</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>