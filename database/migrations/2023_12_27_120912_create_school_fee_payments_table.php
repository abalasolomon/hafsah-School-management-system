<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('school_fee_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('term_id');
            $table->unsignedBigInteger('session_id');
            $table->decimal('amount_paid', 10, 2);
            $table->date('payment_date');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->foreign('session_id')->references('id')->on('sessions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_fee_payments');
    }
};
