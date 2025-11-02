<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

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
</template>

<style scoped>
.img-fluid {
  max-width: 100%;
  height: auto;
}
</style>
