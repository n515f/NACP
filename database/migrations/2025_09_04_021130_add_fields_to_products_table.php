<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::table('products', function (Blueprint $t) {
      if (!Schema::hasColumn('products','vendor_id'))   $t->foreignId('vendor_id')->after('id')->constrained()->cascadeOnDelete();
      if (!Schema::hasColumn('products','category_id')) $t->foreignId('category_id')->nullable()->after('vendor_id')->constrained()->nullOnDelete();
      if (!Schema::hasColumn('products','slug'))        $t->string('slug')->unique()->after('name');
      if (!Schema::hasColumn('products','description')) $t->text('description')->nullable()->after('slug');
      if (!Schema::hasColumn('products','price'))       $t->decimal('price',10,2)->default(0)->after('description');
      if (!Schema::hasColumn('products','sale_price'))  $t->decimal('sale_price',10,2)->nullable()->after('price');
      if (!Schema::hasColumn('products','stock'))       $t->integer('stock')->default(0)->after('sale_price');
      if (!Schema::hasColumn('products','unit'))        $t->string('unit',20)->nullable()->after('stock'); // حبة/كجم...
      if (!Schema::hasColumn('products','image_main'))  $t->string('image_main')->nullable()->after('unit');
      if (!Schema::hasColumn('products','images_count'))$t->unsignedSmallInteger('images_count')->default(0)->after('image_main');
      if (!Schema::hasColumn('products','is_active'))   $t->boolean('is_active')->default(true)->index()->after('images_count');
    });
  }
  public function down(): void {
    Schema::table('products', function (Blueprint $t) {
      foreach (['is_active','images_count','image_main','unit','stock','sale_price',
                'price','description','slug','category_id','vendor_id'] as $c) {
        if (Schema::hasColumn('products',$c)) {
          if (in_array($c,['vendor_id','category_id'])) $t->dropConstrainedForeignId($c);
          else $t->dropColumn($c);
        }
      }
    });
  }
};
