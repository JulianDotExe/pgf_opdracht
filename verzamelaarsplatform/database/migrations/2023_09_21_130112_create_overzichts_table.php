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
        Schema::create('overzichts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gebruiker_id')->unsigned();
            $table->bigInteger('soort_id')->unsigned();
            $table->bigInteger('merk_id')->unsigned();
            $table->bigInteger('catalogusnr')->unsigned();
            $table->bigInteger('epoche_id')->unsigned();
            $table->bigInteger('nummer')->unsigned();
            $table->string('eigenschappen');
            $table->bigInteger('eigenaar_id')->unsigned();
            $table->bigInteger('kleur_id1')->unsigned();
            $table->bigInteger('kleur_id2')->unsigned();
            $table->string('bijzonderheden');
            // $table->('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overzichts');
    }
};
