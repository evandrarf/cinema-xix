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
    Schema::create('schedules', function (Blueprint $table) {
      $table->id();
      $table->foreignId('movie_id');
      $table->foreignId('studio_id');
      $table->dateTime('start');
      $table->dateTime('end');
      $table->integer('price');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('schedules');
  }
};
