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
        Schema::table('guardians', function (Blueprint $table) {
            // Add the user_id foreign key
            $table->foreignId('user_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('guardians', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
