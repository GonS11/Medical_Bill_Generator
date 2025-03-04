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
        Schema::create('pacients', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 9)->unique();
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->date('birthday');
            $table->string('telephone', 12);
            $table->string('insure_num', 30);
            $table->enum('insurance', ['insured', 'not insured'])->default('insured');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacients');
    }
};
