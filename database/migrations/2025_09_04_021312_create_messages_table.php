<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
return new class extends Migration {
  public function up(): void {
    Schema::create('messages', function (Blueprint $t) {
      $t->id();
      $t->foreignId('user_id')->constrained()->cascadeOnDelete();
      $t->foreignId('admin_user_id')->nullable()->constrained('admin_users')->nullOnDelete();
      $t->string('direction',10)->default('in'); // in/out
      $t->text('text')->nullable();
      $t->string('attachment_path')->nullable();
      $t->timestamp('read_at')->nullable();
      $t->timestamps();
    });
  }
  public function down(): void { Schema::dropIfExists('messages'); }
};
