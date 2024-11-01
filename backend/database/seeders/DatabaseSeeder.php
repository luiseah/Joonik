<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Manager
        $user = User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@joonik.com',
            'api_key' => 'secret',
        ]);

        $user->

        $this->call([
            LocationSeeder::class,
        ]);
    }
}
