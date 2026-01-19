<?php

namespace Database\Factories;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dette>
 */
class DetteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'montant' => $this->faker->randomFloat(2, 100, 10000),
            'produit' => $this->faker->word(),
            'montant_restant' => $this->faker->randomFloat(2, 0, $this->faker->randomFloat(2, 100, 10000)),
            'date' => $this->faker->date(),
            'client_id' => Client::factory(),
        ];
    }
}
