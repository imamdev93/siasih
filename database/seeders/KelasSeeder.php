<?php

namespace Database\Seeders;

use App\Models\Kurikulum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kurikulum = Kurikulum::first();

        $kelas = [
            'I' => 'Satu', 
            'II' => 'Dua', 
            'III' => 'Tiga', 
            'IV' => 'Empat', 
            'V' => 'Lima', 
            'VI' => 'Enam', 
        ];

        foreach ($kelas as $key => $value) {
            DB::table('kelas')->insert([
                'nama' => $value,
                'romawi' => $key,
                'kurikulum_id' => $kurikulum->id
            ]);
        }
    }
}
