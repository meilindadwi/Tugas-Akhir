<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KonselorSeeder extends Seeder
{
    public function run()
    {
        DB::table('konselor')->insert([
            'nama' => 'silvi',
            'pengalaman' => 'konselor',
            'foto' => '',
        ]);
    }
}
