<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up(): void {
    Schema::create('product_images', function (Blueprint $t) {
      $t->id();
      $t->foreignId('product_id')->constrained()->cascadeOnDelete();
      $t->string('image_path');
      $t->unsignedSmallInteger('sort')->default(0);
      $t->timestamps();
    });
  }
  public function down(): void { Schema::dropIfExists('product_images'); }
};
