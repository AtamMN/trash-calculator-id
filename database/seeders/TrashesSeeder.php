<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrashesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                DB::table('trashes')->insert([
            [
                'name' => 'Botol Plastik',
                'desc' => 'Botol plastik bekas air mineral',
                'img_path'  => 'frontend/images/p1.png',
                'price'=> 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kardus',
                'desc' => 'Kardus bekas kemasan',
                'img_path'  => 'frontend/images/p2.png',
                'price'=> 2500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kertas',
                'desc' => 'Kertas HVS bekas',
                'img_path'  => 'frontend/images/p3.png',
                'price'=> 1500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kaleng',
                'desc' => 'Kaleng bekas minuman',
                'img_path'  => 'frontend/images/p4.png',
                'price'=> 3000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gelas Plastik',
                'desc' => 'Gelas plastik sekali pakai',
                'img_path'  => 'frontend/images/p5.png',
                'price'=> 800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
