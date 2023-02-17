<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProdukSatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produksatu')->insert([
            [
                'nama_produk' => 'Anesthesia',
                'no_seri' => '1234',
                'distributor' => 'PT. Mitra Inti Medika',
                'rumah_sakit' => 'RSUD Jakarta',
                'tgl_instalasi' => '10 Januari 2022',
                'keterangan' => 'Selesai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Baby Incubator',
                'no_seri' => '1234',
                'distributor' => 'PT. Mitra Inti Medika',
                'rumah_sakit' => 'RSUD Jakarta',
                'tgl_instalasi' => '10 Januari 2022',
                'keterangan' => 'Selesai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
