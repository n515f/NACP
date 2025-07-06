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
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
        $table->enum('method', ['cash', 'credit_card', 'wallet'])->default('cash');
        $table->decimal('amount', 8, 2);
        $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
        $table->string('transaction_id')->nullable(); // من بوابة الدفع مثل Stripe أو PayPal
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
