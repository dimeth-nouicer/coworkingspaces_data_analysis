<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Influence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('influence', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('followers');
            $table->integer('friends');//->nullable();
            $table->integer('users_oneDegree');
            $table->integer('avg_followers');
            $table->integer('favorited_times');
            $table->integer('retweeted_times');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('communitySpace_id');

            $table->foreign('communitySpace_id')->references('id')->on('CommunitySpace')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        //
        Schema::dropIfExists('influence');
        Schema::dropForeign('users_user_id_foreign');
        Schema::dropForeign('communitySpace_communitySpace_id_foreign');
    }
}
