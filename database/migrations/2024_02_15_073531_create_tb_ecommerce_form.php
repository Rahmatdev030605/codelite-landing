<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbEcommerceForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecommerce_form', function (Blueprint $table) {
            $table->id();
            $table->string('portfolio_bef_title');
            $table->string('portfolio_title');
            $table->text('portfolio_desc');
            $table->string('portfolio_image');
            $table->string('project_bef_title');
            $table->string('project_title');
            $table->text('project_desc');
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
        Schema::dropIfExists('ecommerce_form');
    }
}
