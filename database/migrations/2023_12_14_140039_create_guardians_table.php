<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('grand_father_name')->nullable();
            $table->string('father_name');
            $table->string('first_name');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('tribe');
            $table->string('religion');
            $table->string('nin_no')->nullable();
            $table->string('nationality');
            $table->string('relation');
            $table->string('marital_status');
            $table->string('email');
            $table->string('phone_number');
            $table->string('whatsapp_number')->nullable();
            $table->string('work_place');
            $table->string('occupation');
            $table->string('postal_code')->nullable();
            $table->string('po_box')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guardians');
    }
};
