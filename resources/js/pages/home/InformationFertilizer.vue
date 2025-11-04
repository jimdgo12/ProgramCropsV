<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { route } from 'ziggy-js';

const props = defineProps({
  crop: {
    type: Object,
    required: true,
  },
  fertilizers: {
    type: Array,
    default: () => [],
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
      Fertilizantes de {{ crop.name }}
    </template>

    <!-- Slot de la imagen -->
    <template #image>
      <img
        class="img-fluid animated pulse infinite"
        :src="crop.image || '/images/default-crop.jpg'"
        alt="Imagen del cultivo"
      />
    </template>

    <!-- Contenido principal -->
    <Head :title="`Fertilizantes de ${crop.name}`" />

    <section class="page-section bg-primary" id="information">
      <div class="container-fluid how-to-use bg-primary my-5 py-5">
        <div class="container text-white py-5">
          <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-white mb-3">
              <span class="fw-light text-dark">Fertilizantes</span>
            </h1>
            <p class="text-white mb-4 animated slideInRight">{{ crop.name }}</p>
          </div>

          <div class="mx-auto text-center wow fadeIn table-responsive" data-wow-delay="0.1s" style="max-height: 30rem">
            <div class="card">
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
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
                            <img
                              :src="fertilizer.image"
                              :alt="fertilizer.name"
                              class="img-fluid rounded shadow-sm mb-3"
                              width="300"
                              height="300"
                            />
                          </template>
                        </td>
                        <td class="text-start">
                          <p v-if="fertilizer.name"><strong>Nombre:</strong> {{ fertilizer.name }}</p>
                          <p v-if="fertilizer.description"><strong>Descripción:</strong> {{ fertilizer.description }}</p>
                          <p v-if="fertilizer.dose"><strong>Dosis:</strong> {{ fertilizer.dose }}</p>
                          <p v-if="fertilizer.price"><strong>Precio:</strong> {{ fertilizer.price }}</p>
                          <p v-if="fertilizer.type"><strong>Tipo:</strong> {{ fertilizer.type }}</p>
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
  </GuestLayout>
</template>

<style scoped>
.img-fluid {
  max-width: 100%;
  height: auto;
}
</style>
