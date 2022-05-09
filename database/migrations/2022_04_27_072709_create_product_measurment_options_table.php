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
        Schema::create('product_measurment_options', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('product_measurment_id');
            $table->string('name');
            $table->double('amount',8,2)->default("0.00");
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
        Schema::dropIfExists('product_measurment_options');
    }
};
