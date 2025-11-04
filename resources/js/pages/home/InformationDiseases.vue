<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { route } from 'ziggy-js';

const props = defineProps({
  crop: {
    type: Object,
    required: true,
  },
  diseases: {
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
      Enfermedades de {{ crop.name }}
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
    <Head :title="`Enfermedades de ${crop.name}`" />

    <section class="page-section bg-primary" id="information">
      <div class="container-fluid how-to-use bg-primary my-5 py-5">
        <div class="container text-white py-5">
          <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-white mb-3">
              <span class="fw-light text-dark">Enfermedades</span>
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
                    <template v-if="diseases.length">
                      <tr v-for="disease in diseases" :key="disease.id">
                        <td class="text-center">
                          <template v-if="disease.image">
                            <img
                              :src="disease.image"
                              :alt="disease.nameCommon"
                              class="img-fluid rounded shadow-sm mb-3"
                              width="300"
                              height="300"
                            />
                            <Link
                              :href="route('informationPesticides', { crop: crop.id, disease: disease.id })"
                              class="btn btn-success"
                            >
                              Consulta los plaguicidas
                            </Link>
                          </template>
                        </td>
                        <td class="text-start">
                          <p v-if="disease.nameCommon"><strong>Nombre:</strong> {{ disease.nameCommon }}</p>
                          <p v-if="disease.nameScientific"><strong>Nombre científico:</strong> {{ disease.nameScientific }}</p>
                          <p v-if="disease.description"><strong>Descripción:</strong> {{ disease.description }}</p>
                          <p v-if="disease.diagnosis"><strong>Diagnóstico:</strong> {{ disease.diagnosis }}</p>
                          <p v-if="disease.symptoms"><strong>Síntomas:</strong> {{ disease.symptoms }}</p>
                          <p v-if="disease.transmission"><strong>Transmisión:</strong> {{ disease.transmission }}</p>
                          <p v-if="disease.type"><strong>Tipo:</strong> {{ disease.type }}</p>
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
  </GuestLayout>
</template>

<style scoped>
.img-fluid {
  max-width: 100%;
  height: auto;
}
</style>
