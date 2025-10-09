<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the admin user from SQL dump
        User::create([
            'name' => 'Sagar',
            'email' => 'slaure354@gmail.com',
            'email_verified_at' => '2021-10-06 05:49:03',
            'password' => '$2y$10$eq27KzfGksIMdmMXYHg5.ukMIC30hiC.j/01if8sUp2ktFtJaSvj2', // Original hash from SQL
        ]);

        // Create additional admin users for testing
        User::create([
            'name' => 'Admin',
            'email' => 'admin@danirasdalmoth.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Simple password for testing
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // Create additional random users using factory
        User::factory(10)->create();
    }
}
