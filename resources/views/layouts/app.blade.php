<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tutorial Crops</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Librerías externas --}}
    <link href="{{ asset('home/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">

    {{-- Archivos generados por Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 text-center">
                    {{-- Punto de montaje de Vue --}}
                    <div id="app"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
