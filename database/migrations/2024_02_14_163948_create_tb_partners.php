<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPartners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners_form', function (Blueprint $table) {
            $table->id();
            $table->string('partner_bef_title')->nullable();
            $table->string('partner_title')->nullable();
            $table->text('partner_desc')->nullable();
            $table->string  ('our_partner_bef_title')->nullable();
            $table->string('our_partner_title')->nullable();
            $table->text('our_partner_sub')->nullable();
            $table->string('our_partner_image')->nullable();
            $table->text('our_partner_desc')->nullable();
            $table->string('partners_trusted_bef_title')->nullable();
            $table->string('partners_trusted_title')->nullable();
            $table->text('partners_trusted_desc')->nullable();
            $table->string('partners_trust_title')->nullable();
            $table->text('partners_trust_desc_firs')->nullable();
            $table->text('partners_trust_desc_secn')->nullable();
            $table->string('partners_trust_image')->nullable();
            $table->string('team_title')->nullable();
            $table->text('team_desc')->nullable();
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
        Schema::dropIfExists('partners_form');
    }
}
