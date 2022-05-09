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
            $table->integer('user_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->string('razorpay_order_id')->nullable();
            $table->string('razorpay_payment_id')->nullable();
            $table->string('signature')->nullable();
            $table->decimal('cgst',8,2)->defult(0);
            $table->decimal('sgst',8,2)->defult(0);
            $table->decimal('total_price',8,2)->defult(0);
            $table->decimal('total_price_with_tax',8,2)->defult(0);
            $table->decimal('discount_amt',8,2)->defult(0);
            $table->integer('payment_type')->comment("1:online,2:cash_on_delivery")->defult(1);
            $table->integer('status')->comment("1:success,2:unsuccess")->nullable();
            $table->timestamps();
            $table->softDeletes();
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
