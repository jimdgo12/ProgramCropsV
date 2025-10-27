<?php

namespace Database\Factories;

use App\Models\Disease;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crop>
 */
class CropFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => $this->faker->text(50),
            'description' => $this->faker->text(300),
            'nameScientific' => $this->faker->text(150),
            'history' => $this->faker->text(250),
            'phaseFertilizer' => $this->faker->text(200),
            'phaseHarvest' => $this->faker->text(200),
            'spreading' => $this->faker->text(100),
            'image' => $this->faker->imageUrl(800, 600, 'nature', true, 'crop'),
        ];
    }
}
