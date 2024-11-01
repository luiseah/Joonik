<?php

namespace Database\Seeders;

use App\Models\Location;
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

        $token = $user->tokens()->create([
            'name' => 'default',
            'token' =>'secret',
            'abilities' => ['*'],
        ]);

        Location::factory(5)
            ->for($user)
            ->create([

        ]);
    }
}
