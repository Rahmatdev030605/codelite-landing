<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHomePage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('hero_image')->nullable();
            $table->string('hero_sub_image')->nullable();
            $table->string('hero_bef_title')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_desc')->nullable();
            $table->string('our_mdl_bef_title')->nullable();
            $table->string('our_mdl_title')->nullable();
            $table->text('our_mdl_sub_title')->nullable();
            $table->string('product_bef_title')->nullable();
            $table->text('product_title')->nullable();
            $table->string('consult_client_bef_title')->nullable();
            $table->string('consult_client_title')->nullable();
            $table->text('consult_client_desc')->nullable();
            $table->string('project_bef_title')->nullable();
            $table->string('project_title')->nullable();
            $table->text('project_desc')->nullable();
            $table->string('article_bef_title')->nullable();
            $table->string('article_title')->nullable();
            $table->text('article_desc')->nullable();
            $table->string('service_bef_title')->nullable();
            $table->string('service_title')->nullable();
            $table->text('service_desc')->nullable();
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
        Schema::dropIfExists('home');
    }
}
