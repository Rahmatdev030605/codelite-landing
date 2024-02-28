<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurPricingSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_pricing_section', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['active', 'not active'])->default('not active');
            $table->string('title');
            $table->string('heading');
            $table->text('sub_heading');
            $table->string('image');
            $table->string('button_link');
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
        Schema::dropIfExists('our_pricing_section');
    }
}
