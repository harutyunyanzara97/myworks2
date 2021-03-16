<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_followers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('follower_id')->unsigned();
            $table->unsignedBigInteger('leader_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('post_followers', function($table) {
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('leader_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_followers');
    }
}
