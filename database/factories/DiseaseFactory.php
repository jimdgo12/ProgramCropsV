<?php

namespace Database\Factories;

use App\Models\Crop;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disease>
 */
class DiseaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'nameCommon'=> $this->faker->text(50),
            'nameScientific'=> $this->faker->text(150),
            'description'=> $this->faker->text(300),
            'diagnosis'=> $this->faker->text(300),
            'symptoms'=> $this->faker->text(300),
            'transmission'=> $this->faker->text(300),
            'type'=> $this->faker->randomElement(['Tipo A', 'Tipo B', 'Tipo C']),
            'image' => $this->faker->imageUrl(800, 600, 'nature', true, 'disease'),
        ];
    }
}
