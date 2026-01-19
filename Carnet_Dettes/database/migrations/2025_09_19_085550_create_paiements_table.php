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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant_paiement',10, 2);
            $table->date('date_paiement');
            $table->enum('status', ['non payé', 'payé', 'partiellement payé']);
            $table->foreignId('dette_id')->constrained('dettes')->onDelete('cascade');
            $table->timestamps();
            


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
