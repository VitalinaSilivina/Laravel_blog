<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });*/
        Schema::create('posts', function (blueprint $table){
            $table->increments('id');
            $table->string('title',50);
            $table->text('description',350);
            $table->integer('user_id')->unsigned()->index();
            $table->string('author_name');
            //$table->boolean('enabled');
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
        Schema::dropIfExists('posts');
    }
}
