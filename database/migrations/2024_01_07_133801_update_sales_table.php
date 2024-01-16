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
        Schema::table('sales', function (Blueprint $table) {
            // Replace sale_date with sold_by
            $table->dropColumn('sale_date');
            $table->unsignedBigInteger('sold_by')->nullable();
            $table->foreign('sold_by')->references('id')->on('users')->onDelete('SET NULL');

            // Add student_id
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('SET NULL');
        });
    }

    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            // Reverse the changes if needed
            $table->dropForeign(['sold_by']);
            $table->dropForeign(['student_id']);
            $table->dropColumn(['sold_by', 'student_id']);
            $table->timestamp('sale_date');
        });
    }
};
