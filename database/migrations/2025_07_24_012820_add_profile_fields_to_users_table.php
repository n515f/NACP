<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->after('email')->nullable(false);
        $table->string('address')->after('phone')->nullable(false);
        $table->string('country')->after('address')->nullable(false);
        $table->string('profile_image')->after('country')->nullable()->default('default.png');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['phone', 'address', 'country', 'profile_image']);
    });
}

};
