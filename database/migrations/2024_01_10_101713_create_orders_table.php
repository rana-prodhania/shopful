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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->foreignId('division_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->foreignId('area_id')->constrained();
            $table->text('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('notes')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->float('amount',8,2);
            $table->string('order_number')->nullable();
            $table->string('invoice_no');
            $table->timestamp('order_date');
            $table->timestamp('confirmed_date')->nullable();
            $table->timestamp('processing_date')->nullable();
            $table->timestamp('picked_date')->nullable();
            $table->timestamp('shipped_date')->nullable();
            $table->timestamp('delivered_date')->nullable();
            $table->timestamp('cancel_date')->nullable();
            $table->timestamp('return_date')->nullable();
            $table->string('return_reason')->nullable();
            $table->string('status'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
