<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UniqueLandNumber')->unique();
            $table->string('CompanyName');
            $table->string('Status');
            $table->double('LandArea',11,5)->nullable();
            $table->double('SoilProductivityScore',5,2)->nullable();
            $table->date('RegisteredInRC')->nullable();
            $table->string('RegisterNumber')->nullable();
            $table->double('GivenInChange', 11, 5)->nullable();
            $table->double('PlotUnderRealState', 11, 5)->nullable();
            $table->string('LocationLand')->nullable();
            $table->string('VillageLand')->nullable();
            $table->foreign('CompanyName')
                ->references('CompanyName')->on('companies')
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
        Schema::dropIfExists('lands');
    }
}
