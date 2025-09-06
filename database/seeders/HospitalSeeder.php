<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hospitals')->insert([
            ['nama' => 'RS A', 'alamat' => 'Jl A', 'email' => 'a@rs.com', 'telepon' => '081234'],
            ['nama' => 'RS B', 'alamat' => 'Jl B', 'email' => 'b@rs.com', 'telepon' => '081235'],
        ]);
    }
}
