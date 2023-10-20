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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('operation');  // Type d'opération (par exemple, "Transfert", "Retrait", etc.)
            $table->string('contact');    // Numéro de contact ou identifiant
            $table->string('amount'); // Montant de l'opération
            $table->dateTime('transaction_date');  // Date et heure de l'opération
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
