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
    Schema::create('vendor_categories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('vendor_id')->constrained()->onDelete('cascade'); // يرتبط بمطعم
        $table->string('name'); // مثل: مشويات، سندويتشات، حلويات...
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_categories');
    }
};
