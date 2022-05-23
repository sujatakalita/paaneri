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
        Schema::create('product_measurments', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('filed_type')->comment("1:text,2:select")->default(1);
            $table->integer('is_required')->comment("0:no,1:yes")->default(1);
            $table->string('name');
            $table->integer('status')->comment("1:active,2:not active");
            $table->double('amount',8,2)->default('0.00');
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
        Schema::dropIfExists('product_measurments');
    }
};
