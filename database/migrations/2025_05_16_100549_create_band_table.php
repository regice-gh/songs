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
        Schema::create('band', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->string('name', 100)->unique();
            $table->string('genre', 100)->nullable();
            $table->string('founded', 100)->nullable();
            $table->string('active_till', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('band');
    }
};
