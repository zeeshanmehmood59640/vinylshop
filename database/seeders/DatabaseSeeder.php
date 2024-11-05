<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('test')
        ]);
        Todo::factory(20)->create([
            'user_id' => 1
        ]);
        $this->call([
            UserSeeder::class,
            GenreSeeder::class,
            RecordSeeder::class,
        ]);
    }
}
