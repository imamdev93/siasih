<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kurikulum')->insert([
            'nama' => 'Kurikulum Baru',
            'tahun' => '2022/2023'    
        ]);
    }
}
