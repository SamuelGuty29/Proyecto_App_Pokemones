<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Pokemones</title>
    <link rel="stylesheet" href="{{ asset('css/css pokemones/listar_pokemones.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('img/icono.png')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <!-- CSS booststrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</head>

<body>

    @if (session('usuario_logueado'))
        <div class="mensaje_inicio_session">
            <h1 id="procesos_exitoso_inicio_session">{{ session('usuario_logueado') }}</h1>
        </div>
    @endif

    <div style="display: flex; justify-content: center;">
        <img src="{{ asset('img/Pokemon.png') }}" width="500" alt="Pokemon" id="img"
            style="border-radius: 20px;">
    </div>

    <div class="menu">
        @guest
            <a href="{{ route('vista_crear_usuario') }}">Crear Usuario</a>
            <a href="{{ route('vista_login_usuario') }}">Inicia Sesión</a>
        @else
            <a href="{{ route('cerrar_sesion_usuario') }}"> Cerrar Sesión </a>
        @endguest
    </div><br>

    <div class="pokemon-container"></div>

    <nav class="pagination" aria-label="...">
        <ul class="pagination">
            <li class="page-item" id="previous">
                <a class="page-link" href="#" tabindex="-1">Anterior</a>
            </li>
            <li class="page-item" id="next">
                <a class="page-link" href="#">Siguiente</a>
            </li>
        </ul>
    </nav>

    <div id="spinner" class="spinner-border text-light" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    <script src="{{ asset('js_proyecto/js_pokemones/listar_pokemones.js') }}"></script>

</body>

</html>
