<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapel = ['PAI', 'PPKN', 'Bahasa Indonesa', 'IPA', 'IPS', 'Matematika', 'Seni Budaya', 'Penjaskes'];

        foreach ($mapel as $value) {
            DB::table('mata_pelajaran')->insert([
                'nama' => $value
            ]);
        }

        $mapels = MataPelajaran::pluck('id')->toArray();
        $kelas = Kelas::get();

        foreach ($kelas as $value) {
            $value->mapel()->attach($mapels);
        }
    }
}
