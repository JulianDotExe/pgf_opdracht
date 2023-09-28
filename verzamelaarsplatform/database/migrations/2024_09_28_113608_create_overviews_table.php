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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('sort_id')->constrained('sorts');
            $table->foreignId('brand_id')->constrained('brands');
            $table->bigInteger('catalogusnr');
            $table->foreignId('epoche_id')->constrained('epoches');
            $table->bigInteger('nummer');
            $table->string('eigenschappen');
            $table->foreignId('ownder_id')->constrained('owners');
            $table->foreignId('color_id1')->constrained('colors');
            $table->foreignId('color_id2')->constrained('colors');
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
