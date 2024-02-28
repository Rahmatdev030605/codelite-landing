<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHomeBusinessConsulting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_business_consulting', function (Blueprint $table) {
            $table->id();
            $table->string('hero_bef_title')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_desc')->nullable();
            $table->string('client_companies')->nullable();
            $table->string('our_service_bef_title')->nullable();
            $table->string('our_service_title')->nullable();
            $table->text('our_service_desc')->nullable();
            $table->string('company_spec_bef_title')->nullable();
            $table->string('company_spec_title')->nullable();
            $table->string('consult_client_bef_title')->nullable();
            $table->string('consult_client_title')->nullable();
            $table->string('news_bef_title')->nullable();
            $table->string('news_title')->nullable();
            $table->text('news_desc')->nullable();
            $table->string('portfolio_bef_title')->nullable();
            $table->string('portfolio_title')->nullable();
            $table->text('portfolio_desc')->nullable();
            $table->string('our_team_bef_title')->nullable();
            $table->string('our_team_title')->nullable();
            $table->text('our_team_desc')->nullable();
            $table->string('testimonial_bef_title')->nullable();
            $table->string('testimonial_title')->nullable();
            $table->text('testimonial_desc')->nullable();
            $table->string('contact_bef_title')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_desc')->nullable();
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
        Schema::dropIfExists('home_business_consulting');
    }
}
