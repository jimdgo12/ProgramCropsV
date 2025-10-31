<script setup>
import { Head, Link } from '@inertiajs/vue3';
// Importamos el layout que replica la estructura de 'TemplateHome.blade.php'
import GuestLayout from '@/Layouts/GuestLayout.vue'; 

// 1. DEFINICIÓN DE PROPS:
// Las variables PHP $crop y $seeds que venían del controlador ahora son Props de Vue.
const props = defineProps({
  crop: {
    type: Object, // Objeto con el detalle del cultivo actual
    required: true,
  },
  seeds: {
    type: Array, // Lista de semillas (posiblemente un array anidado)
    default: () => [],
  },
});

// 2. USO DEL LAYOUT:
defineOptions({
    layout: GuestLayout,
});
</script>

<template>
    <Head :title="`Semillas de ${crop.name}`" />

    <section class="page-section bg-primary" id="information">
        <div class="container-fluid how-to-use bg-primary my-5 py-5">
            <div class="container text-white py-5">
                
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Semillas</span></h1>
                    <p class="text-white mb-4 animated slideInRight">{{ crop.name }}</p>
                </div>

                <div class="mx-auto text-center wow fadeIn table-responsive" data-wow-delay="0.1s"
                    style="max-height: 30rem">
                    <div class="card">
                        <div class="card-body table-responsive" data-wow-delay="0.1s" style="max-height: 30rem">
                            <table id="example1" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="seeds.length">
                                        <template v-for="(seedGroup, groupIndex) in seeds" :key="`group-${groupIndex}`">
                                            <tr v-for="seed in seedGroup" :key="seed.id">
                                                <td>
                                                    <img :src="seed.image" :alt="seed.name" width="300" height="300">
                                                </td>
                                                <td>
                                                    <br><br>
                                                    <strong>Nombre: </strong><br>{{ seed.name }}<br>
                                                    <strong>Nombre científico: </strong><br>{{ seed.nameScientific }}<br>
                                                    <strong>Origen: </strong><br>{{ seed.origin }}<br>
                                                    <strong>Morfología: </strong><br>{{ seed.morphology }}<br>
                                                    <strong>Tipo: </strong><br>{{ seed.type }}<br>
                                                    <strong>Calidad: </strong><br>{{ seed.quality }}<br>
                                                    <strong>Propagación: </strong><br>{{ seed.spreading }}<br>
                                                    <strong>Imagen: </strong><br>{{ seed.image }}<br>
                                                </td>
                                            </tr>
                                        </template>
                                    </template>
                                    <tr v-else>
                                        <td colspan="2">No se encontraron semillas para este cultivo.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>