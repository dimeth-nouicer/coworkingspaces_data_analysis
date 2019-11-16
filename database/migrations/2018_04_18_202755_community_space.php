<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommunitySpace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('CommunitySpace', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lat');
            $table->string('long');
            $table->string('owner');
            $table->integer('story_id')->unsigned();
            //$table->string('story_title')->unsigned();   

            $table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade');
            //$table->foreign('story_title')->references('title')->on('stories')->onDelete('cascade');
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
         Schema::dropIfExists('CommunitySpace');
        Schema::dropForeign('stories_story_id_foreign');
       // Schema::dropForeign('stories_story_title_foreign');
       
    }
}
