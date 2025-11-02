<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { route } from 'ziggy-js';

const props = defineProps({
  crop: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <GuestLayout>
    <!-- Slot del navbar -->
    <template #items>
      <div class="navbar-nav ms-auto">
        <Link :href="route('informationCrop', { id: crop.id })" class="nav-item nav-link">Información</Link>
        <Link :href="route('informationSeeds', { id: crop.id })" class="nav-item nav-link">Semillas</Link>
        <Link :href="route('informationDiseases', { id: crop.id })" class="nav-item nav-link">Enfermedades</Link>
        <Link :href="route('informationFertilizers', { id: crop.id })" class="nav-item nav-link">Fertilizantes</Link>
      </div>
    </template>

    <!-- Slot del título -->
    <template #title>
      {{ crop.name }}
    </template>

    <!-- Slot de la imagen -->
    <template #image>
      <img class="img-fluid animated pulse infinite" :src="crop.image" alt="Imagen del cultivo" />
    </template>

    <!-- Contenido principal -->
    <Head :title="crop.name" />
    <section class="page-section bg-primary" id="semillas">
      <div class="container-fluid how-to-use bg-primary my-5 py-5">
        <div class="container text-white py-5">
          <div class="mx-auto text-center" style="max-width: 600px;">
            <h3 class="text-black mb-2">Nombre científico</h3>
            <p class="text-white mb-5">{{ crop.nameScientific }}</p>
            <h3 class="text-black mb-2">Descripción</h3>
            <p class="text-white mb-5">{{ crop.description }}</p>
            <h3 class="text-black mb-2">Historia</h3>
            <p class="text-white mb-5">{{ crop.history }}</p>
            <h3 class="text-black mb-2">Fases de fertilización</h3>
            <p class="text-white mb-4">{{ crop.phaseFertilizer }}</p>
            <h3 class="text-black mb-2">Fases de cosecha</h3>
            <p class="text-white mb-4">{{ crop.phaseHarvest }}</p>
            <h3 class="text-black mb-2">Extensión</h3>
            <p class="text-white mb-4">{{ crop.spreading }}</p>
          </div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
