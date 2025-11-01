<script setup>
import { Link } from '@inertiajs/vue3';

// El script está limpio, no necesita importar nada.
</script>

<template>
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <Link :href="$route('index')" class="navbar-brand"> 
                    <h2 class="text-white">Tutorial de cultivos</h2>
                </Link>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <slot name="items">
                        <div class="navbar-nav ms-auto">
                            <Link :href="$route('index')" class="nav-item nav-link active">Inicio</Link>
                        </div>
                    </slot>
                </div>
            </nav>
        </div>
    </div>

    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-4 text-white animated slideInRight align text-center">
                        <slot name="title">Cultivos para el futuro</slot>
                    </h1>
                </div>
                
                <div class="col-lg-6">
                    <slot name="image">
                        <img class="img-fluid animated pulse infinite" 
                             :src="'/home/img/frutas2.jpg'" 
                             alt="Imagen por defecto">
                    </slot>
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
                        &copy; <a class="border-bottom" href="#">Tutorial Crops</a>, Todos los derechos reservados.
                        Hecho por <a class="border-bottom" href="https://htmlcodex.com">Diego Jiménez</a> & <a
                            href="https://themewagon.com">Angelo Estupiñan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>