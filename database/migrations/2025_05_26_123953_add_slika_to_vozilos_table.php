<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('vozilos', function (Blueprint $table) {
        $table->string('slika')->nullable();
    });
}

public function down(): void
{
    Schema::table('vozilos', function (Blueprint $table) {
        $table->dropColumn('slika');
    });
}

};
