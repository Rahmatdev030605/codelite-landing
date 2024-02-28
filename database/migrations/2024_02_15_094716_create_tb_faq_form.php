<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFaqForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_form', function (Blueprint $table) {
            $table->id();
            $table->string('faq_bef_title');
            $table->string('faq_title');
            $table->text('faq_desc');
            $table->string('faq_section_bef_title');
            $table->string('faq_section_title');
            $table->string('our_services_title');
            $table->text('our_services_desc_frs');
            $table->text('our_services_desc_sec');
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
        Schema::dropIfExists('faq_form');
    }
}
