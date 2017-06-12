<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UniqueLandNumber');
            $table->bigInteger('PersonalNumber');
            $table->double('fstPrice',11, 2)->nullable();
            $table->double('sndPrice',11, 2)->nullable();
            $table->integer('Year')->nullable();
            $table->foreign('UniqueLandNumber')
                ->references('UniqueLandNumber')->on('lands')
                ->onDelete('cascade');
            $table->foreign('PersonalNumber')
                ->references('PersonalNumber')->on('entities')
                ->onDelete('cascade');
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
        Schema::dropIfExists('balances');
    }
}
