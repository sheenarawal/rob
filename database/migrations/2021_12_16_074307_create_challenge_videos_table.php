<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengeVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_id')->comment('challenged video');
            $table->string('challenge_video')->comment('challenge by user video');
            $table->string('user_id')->comment('challenge by user');
            $table->string('status')->default(1);
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('challenge_videos');
    }
}
