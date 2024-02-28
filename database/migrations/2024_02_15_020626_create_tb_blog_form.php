<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBlogForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_form', function (Blueprint $table) {
            $table->id();
            $table->string('blog_bef_title');
            $table->string('blog_title');
            $table->text('blog_desc');
            $table->string('featured_product_bef_title');
            $table->string('featured_product_title');
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
        Schema::dropIfExists('blog_form');
    }
}
