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
    Schema::create('studio', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->foreignId('branch_id');
      $table->integer('basic_price');
      $table->integer('additional_friday_price');
      $table->integer('additional_saturday_price');
      $table->integer('additional_sunday_price');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('studio');
  }
};
