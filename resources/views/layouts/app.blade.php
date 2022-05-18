<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />
        <script>
            jQuery(document).ready(function($){
          $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            responsive:{
              0:{
                items:1
              },
              600:{
                items:3
              },
              1000:{
                items:3
              }
            }
          })
        })
        </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('styles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    @if(session('estado'))
        <div class="alert alert-primary text-align-center" role="alert">
            {{session('estado')}}
        </div>
    @endif
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light categorias-bg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#categorias" aria-controls="categorias" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    Categorias
                </button>
                <div class="collapse navbar-collapse " id="categorias">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav w-100 d-flex justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('inicio')}}">
                               Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('nosotros')}}">
                               Nosotros
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('instalaciones')}}">
                                Instalaciones
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contacto')}}">
                                Contacto
                            </a>
                        </li>
                        @if (!Auth::guest())
                            <form action="/logout" method="POST">
                                @csrf
                                <a class="nav-link" onclick="this.closest('form').submit()" href="#">Cerrar Sesion</a>
                            </form>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
