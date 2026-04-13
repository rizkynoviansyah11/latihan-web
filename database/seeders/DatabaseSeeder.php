<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create( attributes:[
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt( value: '12345678'),
        ]);
        User::factory()->create( attributes:[
            'name' => 'Rizky',
            'email' => 'rizkynoviansyaah11@gmail.com',
            'password' => bcrypt( value: '12345678'),
        ]);

        $this->call( class: [
            destinationSeeder::class,
            UserSeeder::class,
        ]);
    }
}
