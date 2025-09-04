<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'slug')) {
                $table->string('slug')->unique()->after('name');
            }
            if (!Schema::hasColumn('categories', 'icon_path')) {
                $table->string('icon_path')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('categories', 'image_path')) {
                $table->string('image_path')->nullable()->after('icon_path');
            }
            if (!Schema::hasColumn('categories', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('image_path')->index();
            }
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'is_active'))  $table->dropColumn('is_active');
            if (Schema::hasColumn('categories', 'image_path')) $table->dropColumn('image_path');
            if (Schema::hasColumn('categories', 'icon_path'))  $table->dropColumn('icon_path');
            if (Schema::hasColumn('categories', 'slug'))       $table->dropUnique(['slug']);
        });
    }
};
