<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\Dette;
use App\Models\Paiement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

      
        Client::factory(10)
            ->has(
                Dette::factory(2)
                    ->has(Paiement::factory(2))
            )
            ->create();
    }
}
