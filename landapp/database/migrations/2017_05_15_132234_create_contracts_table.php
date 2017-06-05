<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UniqueLandNumber');
            $table->bigInteger('PersonalNumber');
            $table->date('RentStartsFrom')->nullable();
            $table->date('RentEndsIn')->nullable();
            $table->date('NewPriceStartingDate')->nullable();
            $table->date('NewPriceTillDate')->nullable();
            $table->string('BankAccount')->nullable();
            $table->string('ContractedBy')->nullable();
            $table->string('Subrenter')->nullable();
            $table->string('Type')->nullable();
            $table->double('PricePerHectare',6,2)->nullable();
            $table->string('PayPerYearUntilMonth')->nullable();
            $table->date('ContractSignDate')->nullable();
            $table->date('ChangesDate')->nullable();
            $table->string('ContractChanges')->nullable();
            $table->integer('Interval')->nullable();
            $table->integer('ContractNumber')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
