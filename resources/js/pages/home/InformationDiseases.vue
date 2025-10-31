<script setup>
import { Head, Link } from '@inertiajs/vue3';
// 1. Importamos el layout que replica la estructura de 'TemplateHome.blade.php'
import GuestLayout from '@/Layouts/GuestLayout.vue'; 

// 2. DEFINICIÓN DE PROPS:
// Las variables PHP $crop y $diseases que venían del controlador ahora son Props de Vue.
const props = defineProps({
  crop: {
    type: Object, // Objeto con el detalle del cultivo actual
    required: true,
  },
  diseases: {
    type: Array, // Lista de enfermedades para ese cultivo
    default: () => [],
  },
});

// 3. USO DEL LAYOUT:
// Indicamos a Inertia que use el componente GuestLayout para envolver este contenido.
defineOptions({
    layout: GuestLayout,
});

// Nota: La lógica para los @section('items'), @section('title'), y @section('image')
// ahora debe ser manejada dentro del GuestLayout.vue, el cual puede acceder a 
// las props del cultivo (crop) que le pasamos.
</script>

<template>
    <Head :title="`Enfermedades de ${crop.name}`" />

    <section class="page-section bg-primary" id="information">
        <div class="container-fluid how-to-use bg-primary my-5 py-5">
            <div class="container text-white py-5">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Enfermedades</span></h1>
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
                                    <template v-if="diseases.length">
                                        <tr v-for="disease in diseases" :key="disease.id">
                                            <td class="text-center">
                                                <template v-if="disease.image">
                                                    <img :src="disease.image" :alt="disease.nameCommon" width="300" height="300">
                                                    <br><br>
                                                    
                                                    <Link 
                                                        :href="route('informationPesticides', { crop: crop.id, disease: disease.id })"
                                                        class="btn btn-success">
                                                        Consulta los plaguicidas
                                                    </Link>
                                                </template>
                                            </td>
                                            <td>
                                                <p v-if="disease.nameCommon"><strong>Nombre: </strong>{{ disease.nameCommon }}</p>
                                                <p v-if="disease.nameScientific"><strong>Nombre científico: </strong>{{ disease.nameScientific }}</p>
                                                <p v-if="disease.description"><strong>Descripción: </strong>{{ disease.description }}</p>
                                                <p v-if="disease.diagnosis"><strong>Diagnóstico: </strong>{{ disease.diagnosis }}</p>
                                                <p v-if="disease.symptoms"><strong>Síntomas: </strong>{{ disease.symptoms }}</p>
                                                <p v-if="disease.transmission"><strong>Transmisión: </strong>{{ disease.transmission }}</p>
                                                <p v-if="disease.type"><strong>Tipo: </strong>{{ disease.type }}</p>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr v-else>
                                        <td colspan="2">No se encontraron enfermedades para este cultivo.</td>
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