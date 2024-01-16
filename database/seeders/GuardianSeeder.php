<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guardian;
use App\Models\User;

class GuardianSeeder extends Seeder
{
    public function run()
    {
        Guardian::factory(10)->create()->each(function ($guardian) {
            // Create a user for each guardian
            $user = User::factory()->create();
            $guardian->user()->associate($user)->save();
        });
    }
}