<script setup>
import { Link } from '@inertiajs/vue3';
// NOTA: Se asume que los estilos CSS y los scripts JS de la plantilla
// se han movido a resources/views/app.blade.php y se gestionan con Vite.
</script>

<template>
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <Link :href="route('index')" class="navbar-brand">
                    <h2 class="text-white">Tutorial de cultivos</h2>
                </Link>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <slot name="items" />
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-4 text-white animated slideInRight align text-center">
                        <slot name="title" />
                    </h1>
                </div>
                <div class="col-lg-6">
                    <slot name="image" />
                </div>
            </div>
        </div>
    </div>
    <slot />
    <div class="container-fluid bg-white footer">
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Tutorial Crops</a>, Todos los derechos
                        reservados.

                        Hecho por <a class="border-bottom" href="https://htmlcodex.com">Diego Jiménez</a> & <a
                            href="https://themewagon.com">Angelo Estupiñan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </template>