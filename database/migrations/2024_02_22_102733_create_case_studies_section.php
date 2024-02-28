<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseStudiesSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_studies_section', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['active', 'not active'])->default('not active');
            $table->string('title')->nullable();
            $table->string('heading')->nullable();
            $table->string('button_link_1')->nullable();
            $table->string('button_link_2')->nullable();
            $table->string('button_link_3')->nullable();
            $table->string('button_link_4')->nullable();
            $table->string('button_link_5')->nullable();
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
        Schema::dropIfExists('case_studies_section');
    }
}
