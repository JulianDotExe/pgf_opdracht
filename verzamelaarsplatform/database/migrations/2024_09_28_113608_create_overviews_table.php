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
        Schema::create('overviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('sort_id')->constrained('sorts');
            $table->foreignId('brand_id')->constrained('brands');
            $table->bigInteger('catalogusnr');
            $table->foreignId('epoche_id')->constrained('epoches');
            $table->bigInteger('nummer');
            $table->string('eigenschappen');
            $table->foreignId('owner_id')->constrained('owners');
            $table->foreignId('color1_id')->constrained('colors1');
            $table->foreignId('color2_id')->constrained('colors2');
            $table->string('bijzonderheden');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overviews');
    }
};
