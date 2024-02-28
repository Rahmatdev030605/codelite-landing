<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAboutUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_form', function (Blueprint $table) {
            $table->id();
            $table->string('company_bef_title')->nullable();
            $table->string('company_title')->nullable();
            $table->text('company_desc')->nullable();
            $table->string('our_company_bef_title')->nullable();
            $table->string('our_company_title')->nullable();
            $table->text('our_company_sub')->nullable();
            $table->string('our_company_image')->nullable();
            $table->text('our_company_desc')->nullable();
            $table->string('service_bef_title')->nullable();
            $table->string('service_title')->nullable();
            $table->text('service_desc')->nullable();
            $table->string('our_team_bef_title')->nullable();
            $table->string('our_team_title')->nullable();
            $table->text('our_team_desc')->nullable();
            $table->string('our_service_image')->nullable();
            $table->string('our_service_title')->nullable();
            $table->text('our_service_desc_frs')->nullable();
            $table->text('our_service_desc_sec')->nullable();
            $table->string('team_title')->nullable();
            $table->string('team_desc')->nullable();
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
        Schema::dropIfExists('about_us_form');
    }
}
