<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            if (!Schema::hasColumn('vendors', 'logo')) {
                $table->string('logo')->nullable()->after('name');
            }
            if (!Schema::hasColumn('vendors', 'description')) {
                $table->text('description')->nullable();
            }
            if (!Schema::hasColumn('vendors', 'cover_image')) {
                $table->string('cover_image')->nullable();
            }
            if (!Schema::hasColumn('vendors', 'rating')) {
                $table->float('rating')->default(0);
            }
            if (!Schema::hasColumn('vendors', 'is_available')) {
                $table->boolean('is_available')->default(true);
            }
            if (!Schema::hasColumn('vendors', 'working_hours')) {
                $table->string('working_hours')->nullable();
            }
            if (!Schema::hasColumn('vendors', 'location')) {
                $table->string('location')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn([
                'logo',
                'description',
                'cover_image',
                'rating',
                'is_available',
                'working_hours',
                'location'
            ]);
        });
    }
};

