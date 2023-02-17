<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('distributor')->insert([
            [
                'nama_distributor' => 'PT. Rajawali Nusindo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_distributor' => 'PT. Mitra Inti Medika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_distributor' => 'PT. Prima Citra Inovindo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
