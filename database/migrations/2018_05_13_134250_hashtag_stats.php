<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HashtagStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hashtagStats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hashtag');
            $table->integer('tweets_without_hashtags');//->nullable();
            $table->integer('tweets_with_hashtags');
            $table->integer('tweets_lessFive_hashtag');
            $table->integer('tweets_moreFive_hashtag');
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
        Schema::dropIfExists('hashtagStats');
        Schema::dropForeign('users_user_id_foreign');
        Schema::dropForeign('communitySpace_communitySpace_id_foreign');
    }
}
