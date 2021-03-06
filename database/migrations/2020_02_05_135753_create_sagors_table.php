<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSagorsTable extends Migration
{
  
    public function up()
    {
        Schema::create('sagors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('sagors');
    }
}
