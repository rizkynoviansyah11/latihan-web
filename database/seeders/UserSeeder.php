<?php

namespace Database\Seeders;
use App\Models\Destination;
use App\Models\User;    
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create( attributes:[
            'name' => 'Fikry Juliansyah',
            'email' => 'Fikry@example.com',
            'password' => bcrypt( value: '12345678'),   
        ]);
        User::factory()->create( attributes:[
            'name' => 'irfan',
            'email' => 'irfan@example.com',
            'password' => bcrypt( value: '12345678'),   
        ]);
        User::factory()->create( attributes:[
            'name' => 'yunus',
            'email' => 'yunus@example.com',
            'password' => bcrypt( value: '12345678'),   
        ]);

        for ($i = 0; $i <= 100; $i++) {
            User::create([
                'name' => fake( 'id_ID' )->name(),
                'email' => fake( 'id_ID' )->email(),
                'password' => bcrypt( value: '12345678'),
            ]);
        }
    }
}