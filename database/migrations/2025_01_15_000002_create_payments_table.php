<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_type', ['registration', 'monthly']); // registration = KSH 1000, monthly fee
            $table->string('mpesa_receipt')->nullable();
            $table->string('mpesa_phone')->nullable();
            $table->string('month_for')->nullable(); // e.g. "January 2025" - which month the payment covers
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamp('transaction_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
