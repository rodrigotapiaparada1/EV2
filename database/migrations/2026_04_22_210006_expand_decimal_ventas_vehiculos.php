<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->decimal('total', 15, 2)->nullable()->change();
        });

        Schema::table('vehiculos', function (Blueprint $table) {
            $table->decimal('precio', 15, 2)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->decimal('total', 10, 2)->nullable()->change();
        });

        Schema::table('vehiculos', function (Blueprint $table) {
            $table->decimal('precio', 10, 2)->nullable()->change();
        });
    }
};
