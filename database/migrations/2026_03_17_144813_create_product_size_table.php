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
        Schema::create('product_size', function (Blueprint $table) {
            //una tabella pivot pura non ha bisogno di id e timestamps. Tecnicamente non causa errori lasciarli, ma è una cattiva pratica.
            //una pivot con id e timestamps segnalerebbe a chi legge il codice che è un Model a sé stante, non una semplice tabella di collegamento.
            $table->foreignId('product_id')->constrained();
            $table->foreignId('size_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_size');
    }
};
