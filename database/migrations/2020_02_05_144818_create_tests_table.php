<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration
{
  
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->integer('age')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('tests');
    }
}
