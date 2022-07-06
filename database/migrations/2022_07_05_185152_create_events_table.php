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
        Schema::create('events', function (Blueprint $table) {
            $table->id('eventID');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('eventName');
            $table->date('eventStartDate');
            $table->date('eventEndtDate');
            $table->longText('eventDesc');
            $table->string('status');
            $table->date('regStartDate');
            $table->date('regEndDate');
            $table->double('fee');
            $table->double('earlyFee');
            $table->string('contactNumEvent');
            $table->string('bankName');
            $table->string('accNumber');
            $table->integer('earlyFeeQt');
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
};
