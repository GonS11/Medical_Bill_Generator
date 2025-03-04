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
        Schema::create('consults', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('hour');
            $table->string('username');  //FK
            $table->string('dni', 9); //FK
            $table->timestamps();

            // Claves foráneas corregidas
            $table->foreign('username')->references('username')->on('doctors')->onDelete('cascade');

            $table->foreign('dni')->references('dni')->on('pacients')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consults');
    }
};
