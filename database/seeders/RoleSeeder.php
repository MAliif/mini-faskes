<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_m')->insert([
            ['role' => 'pendaftaran'],
            ['role' => 'perawat'],
            ['role' => 'dokter'],
            ['role' => 'apoteker'],
            ['role' => 'admin']
        ]);
    }
}
