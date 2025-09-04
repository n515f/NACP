<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('vendors', function (Blueprint $t) {
            if (!Schema::hasColumn('vendors', 'service_type_id')) {
                $t->foreignId('service_type_id')->nullable()
                  ->after('id')->constrained('service_types')->nullOnDelete();
            }
        });
    }
    public function down(): void {
        Schema::table('vendors', function (Blueprint $t) {
            if (Schema::hasColumn('vendors','service_type_id')) {
                $t->dropConstrainedForeignId('service_type_id');
            }
        });
    }
};
