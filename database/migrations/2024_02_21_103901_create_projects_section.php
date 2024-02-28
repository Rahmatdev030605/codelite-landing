<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_section', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['active', 'not active'])->default('not active');
            $table->string('title')->nullable();
            $table->string('heading')->nullable();
            $table->text('sub_heading')->nullable();
            $table->string('button_link')->nullable();
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
        Schema::dropIfExists('projects_section');
    }
}
