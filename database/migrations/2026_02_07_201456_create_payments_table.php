<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('booking_id')->nullable()->constrained();
            $table->string('order_id')->unique();
            $table->string('transaction_id')->nullable();
            $table->decimal('amount', 15, 2);
            $table->enum('payment_type', ['booking_fee', 'dp', 'full_payment']);
            $table->enum('status', ['pending', 'paid', 'failed', 'expired'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->json('midtrans_response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
