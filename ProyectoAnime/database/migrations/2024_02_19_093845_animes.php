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
        Schema::create('animes', function (Blueprint $table) {

            $table->engine='InnoDB';
            $table->id();
            $table->string('nombre');
            $table->bigInteger('estudio_id')->unsigned();
            $table->timestamps();
            $table->foreign('estudio_id')->references('id')->on('estudios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
