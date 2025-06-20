<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INVENTARIO</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/css/home.css', 'resources/css/auth.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(120deg, #f8fafc 0%, #e0e7ff 100%);
            font-family: 'Nunito', sans-serif;
        }
        .navbar {
            background: #4f46e5 !important;
            transition: background 0.5s;
            animation: navbarFadeIn 1s;
        }
        @keyframes navbarFadeIn {
            from { opacity: 0; transform: translateY(-30px);}
            to { opacity: 1; transform: translateY(0);}
        }
        .navbar-brand, .nav-link, .dropdown-item {
            color: #fff !important;
            transition: color 0.3s;
        }
        .nav-link:hover, .dropdown-item:hover {
            color:rgb(165, 180, 252) !important;
        }
        .dropdown-menu {
            background:rgb(99, 101, 241);
        }
        .dropdown-item {
            border-radius: 4px;
        }
        .nav-item .fa-boxes {
            margin-right: 5px;
            animation: iconBounce 1s infinite alternate;
        }
        @keyframes iconBounce {
            from { transform: translateY(0);}
            to { transform: translateY(-5px);}
        }
        main.py-4 {
            animation: contentFadeIn 1.2s;
        }
        @keyframes contentFadeIn {
            from { opacity: 0;}
            to { opacity: 1;}
        }
        /* Estilos para los botones de Login, Registro y Productos */
        .nav-link[href*="login"],
        .nav-link[href*="register"],
        .nav-link[href*="products"] {
            background: #6366f1;
            color: #fff !important;
            border-radius: 20px;
            padding: 6px 18px;
            margin-left: 8px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(99,102,241,0.08);
            transition: background 0.3s, color 0.3s, box-shadow 0.3s;
            animation: btnFadeIn 0.8s;
        }
        .nav-link[href*="login"]:hover,
        .nav-link[href*="register"]:hover,
        .nav-link[href*="products"]:hover {
            background: #818cf8;
            color: #e0e7ff !important;
            box-shadow: 0 4px 16px rgba(99,102,241,0.15);
        }
        @keyframes btnFadeIn {
            from { opacity: 0; transform: translateY(-10px);}
            to { opacity: 1; transform: translateY(0);}
        }
        /* Estilo para el botón del nombre de usuario */
        #navbarDropdown.nav-link.dropdown-toggle {
            background: #6366f1;
            color: #fff !important;
            border-radius: 20px;
            padding: 6px 18px;
            margin-left: 8px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(99,102,241,0.08);
            transition: background 0.3s, color 0.3s, box-shadow 0.3s;
            animation: btnFadeIn 0.8s;
        }
        #navbarDropdown.nav-link.dropdown-toggle:hover,
        #navbarDropdown.nav-link.dropdown-toggle:focus {
            background: #818cf8;
            color: #e0e7ff !important;
            box-shadow: 0 4px 16px rgba(99,102,241,0.15);
        }
    </style>
</head>
<body>

<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    INVENTARIO
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Inicio de seccion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.index') }}">
                                   <i class="fas fa-boxes"></i> Productos
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
