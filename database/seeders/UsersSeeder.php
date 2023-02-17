<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Ali Latukau',
                'email' => 'alilatukau@gmail.com',
                'password' => Hash::make('alilatukau'),
                'no_hp' => '081222005074',
                'level' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kalsum Latukau',
                'email' => 'kalsumlatukau@gmail.com',
                'password' => Hash::make('kalsumlatukau'),
                'no_hp' => '081222005074',
                'level' => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
