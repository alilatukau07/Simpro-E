<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maintenance')->insert([
            [
                'nama_produk' => 'Anesthesia Machine A8500',
                'no_seri' => '1234',
                'rumah_sakit' => 'RSUD Jakarta',
                'distributor' => 'PT. Mitra Inti Medika',
                'tgl_instalasi' =>
                Carbon::now()->format('d-m-Y'),
                'permintaan' => 'Batuk pilek',
                'tindakan' => 'Berdoa aja',
                'status' => 'Belum selesai',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_produk' => 'Anesthesia Machine A8500 GS',
                'no_seri' => '1234',
                'distributor' => 'PT. Mitra Inti Medika',
                'rumah_sakit' => 'RSUD Jakarta',
                'tgl_instalasi' =>
                Carbon::now()->format('d-m-Y'),
                'permintaan' => 'Kepala pusing',
                'tindakan' => 'Diem aja mager soalnya',
                'status' => 'Belum selesai',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
