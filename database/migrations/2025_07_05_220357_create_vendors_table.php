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
    Schema::create('vendors', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained()->onDelete('cascade'); // مثال: تابع لتصنيف "مطاعم"
        $table->string('name');           // اسم المطعم
        $table->text('description')->nullable();
        $table->string('logo')->nullable();     // صورة أو شعار
        $table->string('address')->nullable();
        $table->decimal('lat', 10, 7)->nullable(); // للموقع الجغرافي
        $table->decimal('lng', 10, 7)->nullable();
        $table->boolean('is_open')->default(true);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
