<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Locale;

class destinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'name' => "Asia Heritage",
            'description' => "Asia Heritage merupakan salah satu destinasi wisata tematik yang berada di Kota Pekanbaru, Riau. Tempat ini dirancang dengan konsep “keliling dunia di Asia”, sehingga pengunjung dapat merasakan suasana beberapa negara Asia hanya dalam satu kawasan wisata. Konsep utama yang ditawarkan adalah wisata keluarga, rekreasi santai, spot foto, serta pengenalan budaya Asia dalam bentuk bangunan, dekorasi, dan wahana tematik.",
            'location' => "Jalan Yos Sudarso No. 12, Muara Fajar, Kecamatan Rumbai, Kota Pekanbaru, Riau",
            'working_days' => "Setiap hari",
            'working_hours' => "Pukul 08.00-18.00 WIB",
            'ticket_price' => 50.000,
        ]);

        Destination::create([
            'name' => "Candi Borobudur",
            'description' => "Candi Borobudur adalah salah satu keajaiban dunia yang terletak di Magelang, Jawa Tengah. Candi ini merupakan situs Buddha terbesar di dunia dan merupakan salah satu warisan budaya dunia yang diakui oleh UNESCO. Candi Borobudur dibangun pada abad ke-8 oleh dinasti Syailendra. Candi ini terdiri dari sembilan tingkat, dengan tiga tingkat teratas berbentuk stupa besar yang dihiasi dengan relief-relief Buddha yang indah. Totalnya, terdapat lebih dari 2.500 relief dan 500 stupa kecil di Candi Borobudur.",
            'location' => "Jl. Badrawati, Borobudur, Magelang, Central Java",
            'working_days' => "Setiap hari",
            'working_hours' => "6:30-16:30",
            'ticket_price' => 25.000,
        ]);

        Destination::create([
            'name' => "Air Terjun Tumpak Sewu",
            'description' => "Air Terjun Tumpak Sewu adalah salah satu keajaiban alam yang menakjubkan di Indonesia. Terletak di Kabupaten Lumajang, Jawa Timur, air terjun ini dikenal karena keindahan dan keunikan bentuknya yang mirip dengan tirai air yang menjulang tinggi.",
            'location' => "Kabupaten Lumajang, Jawa Timur",
            'working_days' => "Setiap hari",
            'working_hours' => "24/7",
            'ticket_price' => 0,
        ]);

        Destination::create([
            'name' => "danau singkawang",
            'description' => "Danau Biru Singkawang terbentuk dari genangan air yang mengisi kolam bekas penambangan emas. Setelah lokasi tambang itu ditinggalkan, lubang tambang kemudian menjadi sebuah danau yang indah dengan warnanya yang kebiruan. Namun, pengunjung tidak bisa berenang atau mandi di dalam danau karena airnya yang belum dipastikan keamanannya.",
            'location' => "Pajintan, Kecamatan Singkawang Timur, Kota Singkawang, Kalimantan Barat, Indonesia",
            'working_days' => "Setiap hari",
            'working_hours' => "24/7",
            'ticket_price' => 5.000,
        ]);

        Destination::create([
            'name' => "Istana Siak Sri Indrapura",
            'description' => "Istana Siak merupakan tempat wisata yang ada di Kabupaten Siak, Provinsi Riau, yang mengisyaratkan bahwa objek wisata di Indonesia syarat dengan nilai sejarah yang sangat tinggi.",
            'location' => "Jalan Sultan Syarif Kasim, Kp. Dalam, Siak, Kabupaten Siak, Provinsi Riau",
            'working_days' => "Setiap hari",
            'working_hours' => "Pukul 08.00-16.00 WIB",
            'ticket_price' => 10.000,
        ]);

        Destination::create([
            'name' => "Gunung Bromo",
            'description' => "Gunung Bromo adalah salah satu tempat wisata yang paling terkenal di Indonesia, terletak di Jawa Timur. Gunung ini adalah bagian dari Taman Nasional Bromo Tengger Semeru yang mencakup area seluas sekitar 800 kilometer persegi. Gunung Bromo terkenal karena keindahan alamnya yang menakjubkan dan pemandangan matahari terbit yang spektakuler.",
            'location' => "Kabupaten Malang, Jawa Timur, Indonesia",
            'working_days' => "Setiap hari",
            'working_hours' => "24/7",
            'ticket_price' => 0,
        ]);

        Destination::create([
            'name' => "Danau Lembah Buatan",
            'description' => "Objek wisata di Pekanbaru yang tidak kelah menarik yang selanjutnya adalah danau lembah Sari. Danau ini merupakan  danau buatan yang berlokasi Desa Limbungan yang berjarak 10 km dari pusat kota Pekanbaru.",
            'location' => "Lembah Sari, Kec. Rumbai Pesisir, Kota Pekanbaru, Riau",
            'working_days' => "sabtu - minggu",
            'working_hours' => "08:00 - 17:00",
            'ticket_price' => 5.000,
        ]);

        Destination::create([
            'name' => "Labuan Bajo",
            'description' => "Labuan Bajo merupakan sebuah surga tersembunyi yang ada di Indonesia bagian timur. Desa ini terletak di Kecamatan Komodo, Kabupaten Manggarai Barat, Provinsi Nusa Tenggara Timur yang berbatasan langsung dengan Nusa Tenggara Barat dan dipisahkan oleh Selat Sape. Labuan Bajo adalah salah satu dari lima Destinasi Super Prioritas yang sedang dikembangkan di Indonesia.",
            'location' => "Labuan Bajo, Flores, Nusa Tenggara Timur, Indonesia",
            'working_days' => "Setiap hari",
            'working_hours' => "24/7",
            'ticket_price' => 20.000,
        ]);

        for ($i = 0; $i <= 100; $i++) {
            Destination::create([
                'name' => fake( 'id_ID' )->name(),
                'description' => fake( 'id_ID' )->sentence(),
                'location' => fake( 'id_ID' )->address() . " Pekanbaru, Riau",
                'working_days' => "Setiap hari",
                'working_hours' => "08:00 - 17:00",
                'ticket_price' => rand(10000, 100000),
            ]);
        }
    }
}