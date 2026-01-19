<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dettes', function (Blueprint $table) {
            $table->id();
            
            $table->string('produit', 255);
            $table->decimal('montant', 10, 2);
            $table->date('date');
            $table->decimal('montant_restant', 10, 2);
            $table->foreignId('client_id') // 🔹 crée automatiquement UNSIGNED BIGINT
          ->constrained('clients') // 🔹 fait la référence vers clients(id)
          ->onDelete('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dettes');
    }
};