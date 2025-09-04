<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::table('favorites', function (Blueprint $t) {
      if (!Schema::hasColumn('favorites','user_id'))   $t->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
      if (!Schema::hasColumn('favorites','vendor_id')) $t->foreignId('vendor_id')->nullable()->after('user_id')->constrained()->cascadeOnDelete();
      if (!Schema::hasColumn('favorites','product_id'))$t->foreignId('product_id')->nullable()->after('vendor_id')->constrained()->cascadeOnDelete();

      // منع التكرار لنفس المستخدم ونفس العنصر
      $t->unique(['user_id','vendor_id']);
      $t->unique(['user_id','product_id']);
    });
  }
  public function down(): void {
    Schema::table('favorites', function (Blueprint $t) {
      if (Schema::hasColumn('favorites','product_id')) { $t->dropUnique(['user_id','product_id']); $t->dropConstrainedForeignId('product_id'); }
      if (Schema::hasColumn('favorites','vendor_id'))  { $t->dropUnique(['user_id','vendor_id']);  $t->dropConstrainedForeignId('vendor_id'); }
      if (Schema::hasColumn('favorites','user_id'))     $t->dropConstrainedForeignId('user_id');
    });
  }
};
