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
    Schema::create('vozilos', function (Blueprint $table) {
        $table->id();
        $table->string('marka');
        $table->string('model');
        $table->year('godiste');
        $table->string('registracija');
        $table->boolean('featured')->default(false); // za "Ponuda meseca"
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vozilos');
    }
};
