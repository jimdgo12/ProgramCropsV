<?php

namespace Database\Factories;



use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesticide>
 */
class PesticideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->text(50),
            'description'=> $this->faker->text(300),
            'activeIngredient'=> $this->faker->text(150),
            'price' => $this->faker->numberBetween(1, 300000),//error
            'type'=> $this->faker->randomElement(['Tipo I', 'Tipo II', 'Tipo III', 'Tipo IV']),
            'dose'=> $this->faker->text(150),
            'image' => 'https://picsum.photos/seed/' . $this->faker->uuid . '/800/600',

        ];
    }
}
