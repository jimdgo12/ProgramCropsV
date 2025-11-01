<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tutorial Crops</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Librerías externas (Estilos) --}}
    <link href="{{ asset('home/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">

    {{-- Estilos de la aplicación gestionados por Vite --}}
    @vite('resources/css/app.css') 
</head>

<body class="font-sans antialiased">
    
    {{-- 1. PUNTO DE MONTAJE DE INERTIA --}}
    @inertia 

    
    {{-- 2. CARGA DE RUTAS DE ZIGGY --}}
    @routes 
    
    {{-- 3. CARGA DE JAVASCRIPT DE VITE (Monta la aplicación Vue) --}}
    @vite('resources/js/app.js')

    
    {{-- Dependencias (jQuery y Bootstrap JS) --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Scripts del template --}}
    <script src="{{ asset('home/lib/wow/wow.min.js') }}"></script> 
    <script src="{{ asset('home/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('home/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('home/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    
    {{-- Script principal (donde debe estar la lógica del spinner y más) --}}
    <script src="{{ asset('home/js/main.js') }}"></script> 

    {{-- 🛑 SOLUCIÓN DE FALLO DEL SPINNER: Forzar el ocultamiento con jQuery --}}
    <script>
        // Esto asegura que el spinner se oculte una vez que todos los recursos están cargados.
        // Usa `window.on('load', ...)` para dar tiempo a Vue/DOM a renderizar el spinner.
        $(window).on('load', function () {
            if ($('#spinner').length) {
                $('#spinner').removeClass('show');
            }
        });
    </script>
    
</body>
</html>