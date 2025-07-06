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
    Schema::create('delivery_zones', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // مثلاً: صنعاء الغربية
        $table->decimal('delivery_fee', 8, 2)->default(0);
        $table->text('coordinates')->nullable(); // إذا أردت تحديد نطاق جغرافي
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_zones');
    }
};
