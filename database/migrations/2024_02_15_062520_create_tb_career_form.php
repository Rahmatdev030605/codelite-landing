<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCareerForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_form', function (Blueprint $table) {
            $table->id();
            $table->string('career_bef_title');
            $table->string('career_title');
            $table->text('career_desc');
            $table->string('our_team_image');
            $table->text('our_team_desc');
            $table->string('service_bef_title');
            $table->string('service_title');
            $table->text('service_desc');
            $table->string('job_bef_title');
            $table->string('job_title');
            $table->string('our_services_title');
            $table->text('our_desc_first');
            $table->text('our_desc_second');
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
        Schema::dropIfExists('career_form');
    }
}
