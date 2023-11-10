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
        Schema::create('experinceprof', function (Blueprint $table) {
            $table->id();
            $table->string('poste')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('pays')->nullable();
            $table->string('du')->nullable();
            $table->string('au')->nullable();
            $table->foreignId('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experinceprof');
    }
};
