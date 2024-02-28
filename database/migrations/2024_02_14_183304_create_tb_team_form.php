<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTeamForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_form', function (Blueprint $table) {
            $table->id();
            $table->string('team_bef_title')->nullable();
            $table->string('team_title')->nullable();
            $table->text('team_desc')->nullable();
            $table->string('leadership_bef_title')->nullable();
            $table->string('leadership_title')->nullable();
            $table->text('leadership_desc')->nullable();
            $table->string('features_bef_title')->nullable();
            $table->string('features_title')->nullable();
            $table->text('features_desc')->nullable(); 
            $table->string('our_team_bef_title')->nullable();
            $table->string('our_team_title')->nullable();
            $table->text('our_team_desc')->nullable();
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
        Schema::dropIfExists('team_form');
    }
}
