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
        Schema::create('album', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->string('name', 100)->nullable();
            $table->string('release_date', 100)->nullable();
            $table->string('timer_sold', 100)->nullable();
            $table->unsignedBigInteger('band_id')->index()->nullable();
            $table->foreign('band_id')->references('id')->on('band')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album');
    }
};
