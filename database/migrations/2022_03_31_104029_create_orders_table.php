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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->timestamp('order-time')->nullable();
            $table->double('cgst',8,2)->default(0);
            $table->double('sgst',8,2)->defult(0);
            $table->decimal('total_price',8,2)->defult(0);
            $table->decimal('total_price_with_tax',8,2)->defult(0);
            $table->decimal('discount_amt',8,2)->defult(0);
            $table->integer('payment_type')->comment("1:online,2:cash")->defult(1);
            $table->integer('product_id');
            $table->integer('address_id');
            $table->timestamp('confirmation_time')->nullable();
            $table->integer('delivery_boy_id')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->decimal('delivery_charge',8,2)->defult(0);
            $table->integer('cancelled_by')->nullable();
            $table->timestamp('cancellation_time')->nullable();
            $table->string('cancellation_reason')->nullable();
            $table->integer('coupon_id')->nullable();
            $table->integer('status')->default(0)->comment("1:order_preced,2:order_deleverd,3:order_panding");
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
        Schema::dropIfExists('orders');
    }
};
