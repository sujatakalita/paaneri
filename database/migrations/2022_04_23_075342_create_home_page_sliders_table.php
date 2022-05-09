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
        Schema::create('home_page_sliders', function (Blueprint $table) {
            $table->id();
            $table->text("for_h1_tag")->nullable();
            $table->text("for_h4_tag")->nullable();
            $table->text("button_text")->nullable();
            $table->text("button_url")->nullable();
            $table->string('slider_images');
            $table->integer('status')->comment("1:active,0:in_active");
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
        Schema::dropIfExists('home_page_sliders');
    }
};
