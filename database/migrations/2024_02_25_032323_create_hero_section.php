<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_section', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(false);
            $table->string('title')->nullable();
            $table->string('heading')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('sub_image')->nullable();
            $table->string('highlight_1')->nullable();
            $table->string('highlight_2')->nullable();
            $table->string('highlight_3')->nullable();
            $table->string('button_link_1')->nullable();
            $table->string('button_link_2')->nullable();
            $table->foreignId('page_type_id')->constrained('page_types');
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
        Schema::dropIfExists('hero_section');
    }
}
