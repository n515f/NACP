<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up(): void {
    Schema::table('notifications', function (Blueprint $t) {
      if (!Schema::hasColumn('notifications','user_id'))  $t->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
      if (!Schema::hasColumn('notifications','title'))    $t->string('title')->after('user_id');
      if (!Schema::hasColumn('notifications','body'))     $t->text('body')->nullable()->after('title');
      if (!Schema::hasColumn('notifications','type'))     $t->string('type',40)->nullable()->after('body');
      if (!Schema::hasColumn('notifications','data'))     $t->json('data')->nullable()->after('type');
      if (!Schema::hasColumn('notifications','read_at'))  $t->timestamp('read_at')->nullable()->after('data');
    });
  }
  public function down(): void {
    Schema::table('notifications', function (Blueprint $t) {
      foreach (['read_at','data','type','body','title','user_id'] as $c) {
        if (Schema::hasColumn('notifications',$c)) {
          if ($c==='user_id') $t->dropConstrainedForeignId('user_id'); else $t->dropColumn($c);
        }
      }
    });
  }
};
