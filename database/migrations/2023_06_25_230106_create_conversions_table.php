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
        //cette table contiendra mes différentes paires de monnaies
        Schema::create('conversions', function (Blueprint $table) {
            $table->id();
            $table->decimal("ExchangeRate");
            $table->integer("PairRequest")->default(0);
            $table->timestamps();

            //j'ai deux clés étrangères provenant de ma table Currency qui sont censé recupéré l'id des monnaies
            $table->foreignId("SourceCurrency")->references("id")->on("currencies")->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId("TargetCurrency")->references("id")->on("currencies")->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversions');
    }
};
