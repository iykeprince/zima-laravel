<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('market_id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->string('banner_image')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->unsignedInteger('views')->default(0);
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
        Schema::dropIfExists('shops');
    }
}
