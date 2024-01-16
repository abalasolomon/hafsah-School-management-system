<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        Teacher::create([
            'user_id' => 2,
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'middle_name' => 'M',
            'date_of_birth' => '1990-01-01',
            'place_of_birth' => 'City',
            'gender' => 'Female',
            'marital_status' => 'Single',
            'highest_qualification' => 'Ph.D.',
            'residential_address' => '123 Main St',
            'nearest_landmark' => 'Park',
            'mobile_number' => '1234567890',
            'email' => 'jane.doe@example.com',
            'bank' => 'Bank Name',
            'bank_account_number' => '123456789',
            // Add more fields as needed
        ]);

        // You can add more seed data as required
    }
}