<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table){
            $table->increments('id');
            $table->string('question');
            $table->string('ans0');
            $table->string('ans1');
            $table->string('ans2')->nullable(true);;
            $table->string('ans3')->nullable(true);;
            $table->integer('correct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
