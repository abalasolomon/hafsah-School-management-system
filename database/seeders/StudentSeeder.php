<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Guardian;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::factory(20)->create()->each(function ($student) {
            // Retrieve a random guardian ID and associate it with the student
            $guardian = Guardian::inRandomOrder()->first();
            $student->guardian()->associate($guardian)->save();
        });
    }
}


