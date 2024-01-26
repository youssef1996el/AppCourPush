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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('nom_eleve')->nullable();
            $table->string('nom_professeur')->nullable();
            $table->string('times')->nullable();
            $table->string('days')->nullable();
            $table->string('typecours')->nullable();
            $table->foreignId('idcours')->references('id')->on('cours')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserves');
    }
};
