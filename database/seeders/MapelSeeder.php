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
        $hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];

        foreach ($mapel as $value) {
            DB::table('mata_pelajaran')->insert([
                'nama' => $value
            ]);
        }

        $mapels = MataPelajaran::pluck('id')->toArray();
        $kelas = Kelas::get();

        foreach ($kelas as $value) {
            $random = array_rand($hari, 1);
            $value->mapel()->attach($mapels, ['hari' => $hari[$random]]);
        }
    }
}
