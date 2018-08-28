<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_confirmations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('booking_reference', 70)->unique();
            $table->string('shipment_reference', 70)->nullable();
            $table->date('vgm_cutoff_date')->nullable();
            $table->string('pickup_location');
            $table->string('drop_off_location');
            $table->mediumText('comments');
            $table->string('carrier', 50)->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('booking_confirmations');
    }
}
