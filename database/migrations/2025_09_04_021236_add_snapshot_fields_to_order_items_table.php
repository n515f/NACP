<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up(): void {
    Schema::table('order_items', function (Blueprint $t) {
      if (!Schema::hasColumn('order_items','product_id'))    $t->foreignId('product_id')->nullable()->after('order_id')->constrained()->nullOnDelete();
      if (!Schema::hasColumn('order_items','product_name'))  $t->string('product_name')->after('product_id');
      if (!Schema::hasColumn('order_items','product_image')) $t->string('product_image')->nullable()->after('product_name');
      if (!Schema::hasColumn('order_items','unit_price'))    $t->decimal('unit_price',10,2)->default(0)->after('product_image');
      if (!Schema::hasColumn('order_items','quantity'))      $t->unsignedInteger('quantity')->default(1)->after('unit_price');
      if (!Schema::hasColumn('order_items','total_price'))   $t->decimal('total_price',10,2)->default(0)->after('quantity');
      if (!Schema::hasColumn('order_items','note'))          $t->string('note')->nullable()->after('total_price');
    });
  }
  public function down(): void {
    Schema::table('order_items', function (Blueprint $t) {
      foreach (['note','total_price','quantity','unit_price','product_image','product_name','product_id'] as $c) {
        if (Schema::hasColumn('order_items',$c)) {
          if ($c==='product_id') $t->dropConstrainedForeignId('product_id'); else $t->dropColumn($c);
        }
      }
    });
  }
};
