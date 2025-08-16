<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrashTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trash_types')->insert([
            [
                'name' => 'Botol Plastik',
                'desc' => 'Botol plastik bekas air mineral',
                'img'  => 'frontend/images/p1.png',
                'price'=> 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kardus',
                'desc' => 'Kardus bekas kemasan',
                'img'  => 'frontend/images/p2.png',
                'price'=> 2500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kertas',
                'desc' => 'Kertas HVS bekas',
                'img'  => 'frontend/images/p3.png',
                'price'=> 1500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kaleng',
                'desc' => 'Kaleng bekas minuman',
                'img'  => 'frontend/images/p4.png',
                'price'=> 3000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gelas Plastik',
                'desc' => 'Gelas plastik sekali pakai',
                'img'  => 'frontend/images/p5.png',
                'price'=> 800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
