<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up(): void {
    Schema::table('orders', function (Blueprint $t) {
      if (!Schema::hasColumn('orders','user_id'))        $t->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
      if (!Schema::hasColumn('orders','vendor_id'))      $t->foreignId('vendor_id')->nullable()->after('user_id')->constrained()->nullOnDelete();
      if (!Schema::hasColumn('orders','address_id'))     $t->foreignId('address_id')->nullable()->after('vendor_id')->constrained()->nullOnDelete();
      if (!Schema::hasColumn('orders','driver_id'))      $t->foreignId('driver_id')->nullable()->after('address_id')->constrained()->nullOnDelete();

      if (!Schema::hasColumn('orders','status'))         $t->string('status',30)->default('pending')->index()->after('driver_id');
      if (!Schema::hasColumn('orders','payment_method')) $t->string('payment_method',30)->nullable()->after('status'); // cash/card
      if (!Schema::hasColumn('orders','payment_status')) $t->string('payment_status',30)->default('unpaid')->after('payment_method');

      if (!Schema::hasColumn('orders','subtotal'))       $t->decimal('subtotal',10,2)->default(0)->after('payment_status');
      if (!Schema::hasColumn('orders','delivery_fee'))   $t->decimal('delivery_fee',10,2)->default(0)->after('subtotal');
      if (!Schema::hasColumn('orders','discount'))       $t->decimal('discount',10,2)->default(0)->after('delivery_fee');
      if (!Schema::hasColumn('orders','total'))          $t->decimal('total',10,2)->default(0)->after('discount');

      if (!Schema::hasColumn('orders','notes'))          $t->text('notes')->nullable()->after('total');
    });
  }
  public function down(): void {
    Schema::table('orders', function (Blueprint $t) {
      foreach (['notes','total','discount','delivery_fee','subtotal',
                'payment_status','payment_method','status',
                'driver_id','address_id','vendor_id','user_id'] as $c) {
        if (Schema::hasColumn('orders',$c)) {
          if (in_array($c,['user_id','vendor_id','address_id','driver_id'])) $t->dropConstrainedForeignId($c);
          else $t->dropColumn($c);
        }
      }
    });
  }
};
