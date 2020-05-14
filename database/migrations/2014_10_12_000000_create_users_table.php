<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('contact_address')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('dob')->nullable();
            $table->string('zima_ticket')->default(0);
            $table->string('zima_classified')->default(0);
            $table->string('zima_shop')->default(0);
            $table->string('zima_payment')->default(0);
            $table->string('zima_money')->default(0);
            $table->string('zima_logistics')->default(0);
            $table->string('register_ip')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->string('last_login_at')->nullable();
            $table->string('browser_type')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
