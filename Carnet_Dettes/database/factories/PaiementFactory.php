<?php

namespace Database\Factories;
use App\Models\Dette;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paiement>
 */
class PaiementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'montant_paiement' => $this->faker->randomFloat(2, 50, 5000),
            'date_paiement' => $this->faker->date(),
            'status' => $this->faker->randomElement(['non payé', 'payé', 'partiellement payé']),
           'dette_id' => Dette::factory(),
        ];
    }
}
