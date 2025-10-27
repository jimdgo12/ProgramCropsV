<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crop;
use App\Models\Seed;
use App\Models\Disease;
use App\Models\Pesticide;
use App\Models\Fertilizer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear modelos base
        $crops = Crop::factory(30)->create();
        $seeds = Seed::factory(30)->create();
        $diseases = Disease::factory(30)->create();
        $pesticides = Pesticide::factory(30)->create();
        $fertilizers = Fertilizer::factory(30)->create();

        // Relación: Crop ↔ Fertilizer
        foreach ($crops as $crop) {
            $crop->fertilizers()->sync(
                $fertilizers->random(rand(1, 3))->pluck('id')->toArray()
            );
        }

        // Relación: Crop ↔ Disease
        foreach ($crops as $crop) {
            $crop->diseases()->sync(
                $diseases->random(rand(1, 2))->pluck('id')->toArray()
            );
        }

        // Relación: Disease ↔ Pesticide (corregida con pluck)
        foreach ($diseases as $disease) {
            $disease->pesticides()->sync(
                $pesticides->random(rand(1, 2))->pluck('id')->toArray()
            );
        }

        // Mensajes en consola para validar
        $this->command->info('✔ Modelos base creados: crops, seeds, diseases, pesticides, fertilizers.');
        $this->command->info('🔗 Relaciones establecidas: Crop-Fertilizer, Crop-Disease, Disease-Pesticide.');
    }
}
