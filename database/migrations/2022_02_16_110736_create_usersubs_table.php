<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersubs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sub_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sub_id')->references('id')->on('subs');
            $table->boolean('is_unlimited')->default(false);
            $table->string('expiring_date')->nullable();//NoOfAds
            $table->integer('NoOfAds');
            $table->longText('payment');
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
        Schema::dropIfExists('usersubs');
    }
}
