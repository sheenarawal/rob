<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('title')->nullable();
            $table->text('videolink');
            $table->text('slug')->nullable();
            $table->string('recording_date')->nullable();
            $table->string('recording_location')->nullable();
            $table->string('video_language')->nullable();
            $table->text('desc')->nullable();
            $table->string('is_comment_enable_status')->default(0);
            $table->string('status')->default(0);
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
        Schema::dropIfExists('video');
    }
}
