<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { route } from 'ziggy-js';

const props = defineProps({
  crop: {
    type: Object,
    required: true,
  },
  seeds: {
    type: Array,
    default: () => [],
  },
});

const currentComponent = usePage().component;
</script>

<template>
  <GuestLayout>
    <!-- Slot del navbar -->
    <template #items>
      <div class="navbar-nav ms-auto">
        <Link
          v-if="currentComponent !== 'InformationCrop'"
          :href="route('informationCrop', { id: crop.id })"
          class="nav-item nav-link"
        >
          Información
        </Link>
        <Link
          v-if="currentComponent !== 'InformationSeeds'"
          :href="route('informationSeeds', { id: crop.id })"
          class="nav-item nav-link"
        >
          Semillas
        </Link>
        <Link
          v-if="currentComponent !== 'InformationDiseases'"
          :href="route('informationDiseases', { id: crop.id })"
          class="nav-item nav-link"
        >
          Enfermedades
        </Link>
        <Link
          v-if="currentComponent !== 'InformationFertilizers'"
          :href="route('informationFertilizers', { id: crop.id })"
          class="nav-item nav-link"
        >
          Fertilizantes
        </Link>
      </div>
    </template>

    <!-- Slot del título -->
    <template #title>
      Semillas de {{ crop.name }}
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
    <Head :title="`Semillas de ${crop.name}`" />

    <section class="page-section bg-primary" id="information">
      <div class="container-fluid how-to-use bg-primary my-5 py-5">
        <div class="container text-white py-5">
          <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-white mb-3">
              <span class="fw-light text-dark">Semillas</span>
            </h1>
            <p class="text-white mb-4 animated slideInRight">{{ crop.name }}</p>
          </div>

          <div class="mx-auto text-center wow fadeIn table-responsive" data-wow-delay="0.1s" style="max-height: 30rem">
            <div class="card">
              <div class="card-body table-responsive" style="max-height: 30rem">
                <table class="table table-striped table-bordered table-hover">
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
                            <img
                              :src="seed.image || '/images/default-seed.png'"
                              :alt="seed.name"
                              class="img-fluid rounded shadow-sm"
                              width="300"
                              height="300"
                            />
                          </td>
                          <td>
                            <strong>Nombre:</strong><br />{{ seed.name }}<br />
                            <strong>Nombre científico:</strong><br />{{ seed.nameScientific }}<br />
                            <strong>Origen:</strong><br />{{ seed.origin }}<br />
                            <strong>Morfología:</strong><br />{{ seed.morphology }}<br />
                            <strong>Tipo:</strong><br />{{ seed.type }}<br />
                            <strong>Calidad:</strong><br />{{ seed.quality }}<br />
                            <strong>Propagación:</strong><br />{{ seed.spreading }}<br />
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
  </GuestLayout>
</template>

<style scoped>
.img-fluid {
  max-width: 100%;
  height: auto;
}
</style>
