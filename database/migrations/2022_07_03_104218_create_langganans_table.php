<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangganansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langganans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subs_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->dateTime('end_subscription')->nullable();

            $table->foreign('subs_id')->references('id')->on('subscriptions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('langganans');
    }
}
