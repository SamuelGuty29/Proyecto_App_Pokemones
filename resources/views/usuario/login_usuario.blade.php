<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/css login/estilos_login_usuario.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('img/Pokemon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('img/icono.png')}}" type="image/x-icon">
    <title>Iniciar Sessión</title>
</head>

<body>

    @if (session('cuenta_creada'))
        <div class="mensaje">
            <h1 id="procesos-exitosos">{{ session('cuenta_creada') }} <i class="bi bi-check2-square"></i></h1>
        </div>
    @endif

    @if (session('usuario_no_logueado'))
        <div class="mensaje_usuario_no_logueado">
            <h1 id="procesos_exitosos_usuario_no_logueado">{{ session('usuario_no_logueado') }} <i
                    class="bi bi-emoji-laughing"></i></h1>
        </div>
    @endif

    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div class="titulo">
                    Bienvenido
                </div>
                <form id="loginform" action="{{ route('validar_login') }}" method="POST">

                    @csrf

                    <input type="email" name="email" placeholder="Correo Electronico" required>

                    <input type="password" placeholder="Contraseña" name="password" required>

                    <button type="submit" title="Ingresar" name="Ingresar">Iniciar Sesión</button>

                </form>

                <div class="pie-form">
                    <a href="{{ route('vista_crear_usuario') }}">¿No tienes Cuenta? Registrate</a>
                    <a href="{{ route('index.pokemones') }}">INICIO</a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js_proyecto/js mensajes_personalizados/mensajes.js')}}"></script>
</body>
</html>
