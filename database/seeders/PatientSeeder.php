<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            ['nama' => 'Pasien A', 'alamat' => 'Jl X', 'no_telpon' => '081111', 'id_rumah_sakit' => 1],
            ['nama' => 'Pasien B', 'alamat' => 'Jl Y', 'no_telpon' => '081112', 'id_rumah_sakit' => 2],
        ]);
    }
}
