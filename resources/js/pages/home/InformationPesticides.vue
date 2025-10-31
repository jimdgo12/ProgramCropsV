<script setup>
import { Head, Link } from '@inertiajs/vue3';
// Importamos el layout que replica la estructura de 'TemplateHome.blade.php'
import GuestLayout from '@/Layouts/GuestLayout.vue'; 

// 1. DEFINICIÓN DE PROPS:
// Las tres variables PHP ahora son Props de Vue.
const props = defineProps({
  crop: {
    type: Object, // Objeto con el detalle del cultivo (para el header y la navegación)
    required: true,
  },
  disease: {
    type: Object, // Objeto con el detalle de la enfermedad
    required: true,
  },
  pesticides: {
    type: Array, // Lista de plaguicidas para esa enfermedad
    default: () => [],
  },
});

// 2. USO DEL LAYOUT:
defineOptions({
    layout: GuestLayout,
});
</script>

<template>
    <Head :title="`Plaguicidas para ${disease.nameCommon}`" />

    <section class="page-section bg-primary" id="information">
        <div class="container-fluid how-to-use bg-primary my-5 py-5">
            <div class="container text-white py-5">

                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Enfermedad</span></h1>
                    <p class="text-white mb-4 animated slideInRight">{{ disease.nameCommon }}</p>
                </div>

                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s">
                    <div class="card">
                        <div v-if="disease" class="card-body" data-wow-delay="0.1s" >
                            <table id="example1" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <img :src="disease.image" :alt="disease.nameCommon" width="300" height="300">
                                        </td>
                                        <td>
                                            <strong>Nombre: </strong><br>{{ disease.nameCommon }}<br>
                                            <strong>Nombre científico: </strong><br>{{ disease.nameScientific }}<br>
                                            <strong>Descripción: </strong><br>{{ disease.description }}<br>
                                            <strong>Diágnostico: </strong><br>{{ disease.diagnosis }}<br>
                                            <strong>Sintomas: </strong><br>{{ disease.symptoms }}<br>
                                            <strong>Transmisión: </strong><br>{{ disease.transmission }}<br>
                                            <strong>Tipo: </strong><br>{{ disease.type }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <br><br>
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Plaguicidas</span></h1>
                    <p class="text-white mb-4 animated slideInRight">{{ disease.nameCommon }}</p>
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
                                    <template v-if="pesticides.length">
                                        <tr v-for="pesticide in pesticides" :key="pesticide.id">
                                            <td class="text-center">
                                                <img :src="pesticide.image" :alt="pesticide.name" width="300" height="300">
                                            </td>
                                            <td>
                                                <strong>Nombre: </strong><br>{{ pesticide.name }}<br>
                                                <strong>Descrición: </strong><br>{{ pesticide.description }}<br>
                                                <strong>Ingrediente Activo: </strong><br>{{ pesticide.activeIngredient }}<br>
                                                <strong>Precio: </strong><br>{{ pesticide.price }}<br>
                                                <strong>tipo: </strong><br>{{ pesticide.type }}<br>
                                                <strong>dosis: </strong><br>{{ pesticide.dose }}
                                            </td>
                                        </tr>
                                    </template>
                                    <tr v-else>
                                        <td colspan="2">No se encontraron plaguicidas para esta enfermedad.</td>
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