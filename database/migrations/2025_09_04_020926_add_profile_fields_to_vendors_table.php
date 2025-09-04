<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('vendor_hours')) {
            Schema::create('vendor_hours', function (Blueprint $t) {
                $t->id();
                $t->foreignId('vendor_id')->constrained()->cascadeOnDelete();
                $t->unsignedTinyInteger('day_of_week'); // 0=الأحد..6=السبت
                $t->time('opens_at')->nullable();
                $t->time('closes_at')->nullable();
                $t->boolean('is_closed')->default(false);
                $t->timestamps();
                $t->unique(['vendor_id','day_of_week']);
            });
        }
    }
    public function down(): void {
        Schema::dropIfExists('vendor_hours');
    }
};
