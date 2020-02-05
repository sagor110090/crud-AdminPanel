<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
  
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Mehedi')->nullable();
            $table->string('tv')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('posts');
    }
}
