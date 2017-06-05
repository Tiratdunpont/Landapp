<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UniqueLandNumber');
            $table->bigInteger('PersonalNumber');
            $table->double('RentedArea',11, 5)->nullable();
            $table->string('ReferencedCompany')->nullable();
            $table->string('Subrenter')->nullable();
            $table->date('SubrentTillDate')->nullable();
            $table->double('SubrentedArea', 10, 5)->nullable();
            $table->string('SubrentRC')->nullable();
            $table->date('SubrentRCSince')->nullable();
            $table->date('OwnedDate')->nullable();
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
        Schema::dropIfExists('details');
    }
}
