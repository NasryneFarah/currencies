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
        //la table des monnaies contenant le nom et le code de la moonaie
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('CurrencyCode');
            $table->string('CurrencyName');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
