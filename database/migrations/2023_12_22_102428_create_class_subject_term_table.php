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
        Schema::create('classes_subject_term', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classes_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('term_id');
            $table->timestamps();

            $table->foreign('classes_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_subject_term');
    }
};
