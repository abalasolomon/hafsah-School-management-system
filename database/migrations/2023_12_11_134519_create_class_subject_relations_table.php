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
        Schema::create('class_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            // Add more fields as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_subject');
    }
};
