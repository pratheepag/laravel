<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiosVideosImagesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_image', function (Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->integer('image_id')->unsigned();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });
		
		Schema::create('article_audio', function (Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->integer('audio_id')->unsigned();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('audio_id')->references('id')->on('audios')->onDelete('cascade');
        });
		
		Schema::create('article_video', function (Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->integer('video_id')->unsigned();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_image');
		Schema::dropIfExists('article_audio');
		Schema::dropIfExists('article_video');
    }
}
