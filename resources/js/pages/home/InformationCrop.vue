<script setup>
import { Head, Link } from '@inertiajs/vue3';
// Importamos el layout que replica la estructura de 'TemplateHome.blade.php'
import GuestLayout from '@/Layouts/GuestLayout.vue'; 

// 1. DEFINICIÓN DE PROPS:
// La variable PHP $crop que venía del controlador ahora es una Prop de Vue.
const props = defineProps({
  crop: {
    type: Object, // Esperamos que sea un objeto (array asociativo en PHP)
    required: true,
  },
});

// 2. USO DEL LAYOUT:
// Indicamos a Inertia que use el componente GuestLayout para envolver este contenido.
defineOptions({
    layout: GuestLayout,
});

// 3. LÓGICA DE NAVEGACIÓN (Items):
// La navegación que estaba en @section('items') ahora se define aquí como un objeto 
// y el Layout (GuestLayout.vue) debe usar esta información para renderizar el menú.
// *Nota: En Vue, las rutas se definen una vez en Laravel y se acceden con la función route().
const navLinks = [
    { name: 'Información', route: 'informationCrop', active: true },
    { name: 'Semillas', route: 'informationSeeds' },
    { name: 'Enfermedades', route: 'informationDiseases' },
    { name: 'Fertilizantes', route: 'informationFertilizers' },
];
</script>

<template>
    <Head :title="crop.name" />

    <section class="page-section bg-primary" id="semillas">
        <div class="container-fluid how-to-use bg-primary my-5 py-5">
            <div class="container text-white py-5">
                
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h3 class="text-black mb-2">Nombre</h3>
                    <p class="text-white mb-5 animated slideInRight">{{ crop.name }}</p>
                </div>
                
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h3 class="text-black mb-2">Nombre científico</h3>
                    <p class="text-white mb-5 animated slideInRight">{{ crop.nameScientific }}</p>
                </div>

                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h3 class="text-black mb-2">Descripción</h3>
                    <p class="text-white mb-5 animated slideInRight">{{ crop.description }}</p>
                </div>
                
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h3 class="text-black mb-2">Historia</h3>
                    <p class="text-white mb-5 animated slideInRight">{{ crop.history }}</p>
                </div>
                
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h3 class="text-black mb-2">Fases de fertilización</h3>
                    <p class="text-white mb-4 animated slideInRight">{{ crop.phaseFertilizer }}</p>
                </div>
                
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h3 class="text-black mb-2">Fases de cosecha</h3>
                    <p class="text-white mb-4 animated slideInRight">{{ crop.phaseHarvest }}</p>
                </div>
                
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h3 class="text-black mb-2">Extensión</h3>
                    <p class="text-white mb-4 animated slideInRight">{{ crop.spreading }}</p>
                </div>

            </div>
        </div>
    </section>
</template>