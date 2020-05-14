<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('slug')->nullable();
            $table->string('event_uid')->nullable();
            $table->string('event_name')->nullable();
            $table->string('event_start_date')->nullable();
            $table->string('event_end_date')->nullable();
            $table->string('event_start_time')->nullable();
            $table->string('event_end_time')->nullable();
            $table->text('event_description')->nullable();
            $table->string('event_cover_image')->nullable();
            $table->string('event_venue')->nullable();
            $table->string('organiser_name')->nullable();
            $table->string('organiser_email')->nullable();
            $table->string('organiser_phone_number')->nullable();
            $table->string('minimum_age')->nullable();
            $table->string('ticket_sales_start')->nullable();
            $table->string('ticket_sales_end')->nullable();
            $table->string('ticket_sales_limit')->nullable();
            $table->string('isVerified')->default(0);
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
        Schema::dropIfExists('events');
    }
}
