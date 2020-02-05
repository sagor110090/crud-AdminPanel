<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration
{
  
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Name')->nullable();
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('employees');
    }
}
