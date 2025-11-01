<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted, nextTick } from 'vue';
import { route } from 'ziggy-js'; // ✅ Importar Ziggy para usar rutas de Laravel

defineProps({
  crops: {
    type: Array,
    default: () => [],
  },
});

onMounted(async () => {
  await nextTick(); // Espera a que el DOM esté listo

  const cards = document.querySelectorAll('.crop-card');

  cards.forEach((card) => {
    new window.Waypoint({
      element: card,
      handler: function () {
        card.classList.add('animate__animated', 'animate__fadeInUp');
      },
      offset: '80%',
    });
  });
});
</script>

<template>
  <Head title="Inicio" />

  <GuestLayout>
    <template #title>
      Cultivos <br />para la vida
    </template>

    <section class="page-section bg-primary" id="crop">
      <div class="container-fluid how-to-use bg-primary my-5 py-5">
        <div class="container text-white py-5">
          <div
            class="mx-auto text-center wow fadeIn"
            data-wow-delay="0.1s"
            style="max-width: 600px"
          >
            <h1 class="text-white mb-3">
              <span class="fw-light text-dark">Cultivos para la vida</span>
            </h1>
          </div>

          <div class="row gx-4 gx-lg-5">
            <div
              class="offset-2 col-lg-8 text-center table-responsive"
              style="max-height: 30rem"
            >
              <template v-if="crops && crops.length > 0">
                <a
                  v-for="crop in crops"
                  :key="crop.id"
                  :href="route('informationCrop', crop.id)"
                >
                  <div class="card mb-3 crop-card" style="max-width: 900px">
                    <div class="row g-0 d-flex align-content-center">
                      <div class="col-md-4">
                        <img
                          :src="crop.image || '/images/default.jpg'"
                          class="img-fluid"
                          :alt="crop.name"
                        />
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{ crop.name }}</h5>
                          <p class="card-text">{{ crop.description }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </template>

              <div v-else class="text-center text-danger">
                <h4 class="text-white">⚠️ No hay cultivos disponibles.</h4>
                <p class="text-white">
                  Por favor, asegúrate de que tu base de datos tenga cultivos
                  registrados.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
