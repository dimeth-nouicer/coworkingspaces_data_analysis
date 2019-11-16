<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hashtags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hashtags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hashtag');//->nullable();
            $table->integer('frequency');
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
        Schema::dropIfExists('hashtags');
        Schema::dropForeign('users_user_id_foreign');
        Schema::dropForeign('communitySpace_communitySpace_id_foreign');
    }
}
