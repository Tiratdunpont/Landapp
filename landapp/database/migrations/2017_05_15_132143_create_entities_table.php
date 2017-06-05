<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('PersonalNumber')->unique();
            $table->string('Name')->nullable();
            $table->string('Surname')->nullable();
            $table->bigInteger('Phone')->nullable();
            $table->string('OtherContactInformation')->nullable();
            $table->string('Town')->nullable();
            $table->string('Street')->nullable();
            $table->string('House')->nullable();
            $table->string('Flat')->nullable();
            $table->integer('AreaNumber')->nullable();
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
        Schema::dropIfExists('entities');
    }
}
