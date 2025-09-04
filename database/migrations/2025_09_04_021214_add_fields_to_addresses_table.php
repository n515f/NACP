<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up(): void {
    Schema::table('addresses', function (Blueprint $t) {
      if (!Schema::hasColumn('addresses','user_id'))    $t->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
      if (!Schema::hasColumn('addresses','label'))      $t->string('label',60)->nullable()->after('user_id'); // المنزل/العمل
      if (!Schema::hasColumn('addresses','details'))    $t->string('details')->nullable()->after('label');
      if (!Schema::hasColumn('addresses','lat'))        $t->decimal('lat',10,7)->nullable()->after('details');
      if (!Schema::hasColumn('addresses','lng'))        $t->decimal('lng',10,7)->nullable()->after('lat');
      if (!Schema::hasColumn('addresses','is_default')) $t->boolean('is_default')->default(false)->after('lng');
    });
  }
  public function down(): void {
    Schema::table('addresses', function (Blueprint $t) {
      foreach (['is_default','lng','lat','details','label','user_id'] as $c) {
        if (Schema::hasColumn('addresses',$c)) {
          if ($c==='user_id') $t->dropConstrainedForeignId('user_id'); else $t->dropColumn($c);
        }
      }
    });
  }
};
