<script setup>
import { Head, Link } from '@inertiajs/vue3';
// 1. Importamos el layout que replica la estructura de 'TemplateHome.blade.php'
import GuestLayout from '@/Layouts/GuestLayout.vue'; 

// 2. DEFINICIÓN DE PROPS:
// Las variables PHP $crop y $fertilizers que venían del controlador ahora son Props de Vue.
const props = defineProps({
  crop: {
    type: Object, // Objeto con el detalle del cultivo actual
    required: true,
  },
  fertilizers: {
    type: Array, // Lista de fertilizantes para ese cultivo
    default: () => [],
  },
});

// 3. USO DEL LAYOUT:
// Indicamos a Inertia que use el componente GuestLayout para envolver este contenido.
defineOptions({
    layout: GuestLayout,
});
</script>

<template>
    <Head :title="`Fertilizantes de ${crop.name}`" />

    <section class="page-section bg-primary" id="information">
        <div class="container-fluid how-to-use bg-primary my-5 py-5">
            <div class="container text-white py-5">
                
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Fertilizantes</span></h1>
                    <p class="text-white mb-4 animated slideInRight">{{ crop.name }}</p>
                </div>

                <div class="mx-auto text-center wow fadeIn table-responsive" data-wow-delay="0.1s"
                    style="max-height: 30rem">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="fertilizers.length">
                                        <tr v-for="fertilizer in fertilizers" :key="fertilizer.id">
                                            <td class="text-center">
                                                <template v-if="fertilizer.image">
                                                    <img :src="fertilizer.image" :alt="fertilizer.name" width="300" height="300">
                                                    <br><br>
                                                </template>
                                            </td>
                                            <td>
                                                <template v-if="fertilizer.name">
                                                    <br>
                                                    <strong>Nombre: </strong>{{ fertilizer.name }}<br>
                                                </template>
                                                <template v-if="fertilizer.description">
                                                    <br>
                                                    <strong>Descripción: </strong>{{ fertilizer.description }}<br>
                                                </template>
                                                <template v-if="fertilizer.dose">
                                                    <br>
                                                    <strong>Dosis: </strong>{{ fertilizer.dose }}<br>
                                                </template>
                                                <template v-if="fertilizer.price">
                                                    <br>
                                                    <strong>Precio: </strong>{{ fertilizer.price }}<br>
                                                </template>
                                                <template v-if="fertilizer.type">
                                                    <br>
                                                    <strong>Tipo: </strong>{{ fertilizer.type }}<br>
                                                </template>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr v-else>
                                        <td colspan="2">No se encontraron fertilizantes para este cultivo.</td>
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