<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Atraction;

class AtractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   use WithoutModelEvents;

    public function run(): void
    {
        // User::factory(10)->create();

        Atraction::factory()->create( attributes:[
            'name' => 'Pantai Kuta',
            'description' => 'Pantai Kuta adalah salah satu pantai terkenal di Bali yang menawarkan pasir putih, ombak yang cocok untuk berselancar, dan pemandangan matahari terbenam yang indah.',
        ]);

        Atraction::factory()->create( attributes:[
            'name' => 'Candi Borobudur',
            'description' => 'Candi Borobudur adalah sebuah candi Buddha yang terletak di Magelang, Jawa Tengah. Candi ini terkenal dengan arsitektur yang megah dan relief yang indah.',
        ]);

        // for ($i = 0; $i <= 100; $i++) {
        //     Atraction::create([
        //         'name' => fake( 'id_ID' )->name(),
        //         'description' => fake( 'id_ID' )->text(),
                
        //     ]);
        // }
    }
}
