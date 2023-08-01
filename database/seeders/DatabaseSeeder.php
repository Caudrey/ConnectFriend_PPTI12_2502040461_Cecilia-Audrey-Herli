<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Work::create([
            'job' => 'Computer'
        ]);
        Work::create([
            'job' => 'Health'
        ]);
        Work::create([
            'job' => 'Finance'
        ]);
        Work::create([
            'job' => 'Education'
        ]);
        Work::create([
            'job' => 'Marketing'
        ]);
        User::create([
            'name' => 'Cecilia Audrey Herli',
            'gender' => 'female',
            'interest_work' => '[1, 2, 3]',
            'linkedin_username' => 'cecil',
            'phoneNumber' => '+6281319363809',
            'imagePath' => 'https://',
            'DoB' => now(),
            'wallet' => 100000,
            'password' => bcrypt('12345'),
            'email' => 'cecil@gmail.com'
        ]);
    }
}
