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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_id')->nullable()->constrained('guardians');
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
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
