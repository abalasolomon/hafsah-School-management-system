<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Assuming you have a 'users' table
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('highest_qualification');
            $table->string('residential_address');
            $table->string('nearest_landmark')->nullable();
            $table->string('mobile_number');
            $table->string('email');
            $table->string('bank');
            $table->string('bank_account_number');
            // Add more fields as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
