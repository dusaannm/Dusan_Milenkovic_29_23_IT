<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pregleds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vozilo_id')->constrained()->onDelete('cascade');
            $table->date('datum');
            $table->time('vreme');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pregleds');
    }
};
