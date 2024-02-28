<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('job')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('link_linkedin')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_twitter')->nullable();
            $table->string('email')->nullable();
            $table->string('box_message_heading')->nullable();
            $table->text('box_message_desc')->nullable();
            $table->string('button_link')->nullable();
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
        Schema::dropIfExists('team');
    }
}
