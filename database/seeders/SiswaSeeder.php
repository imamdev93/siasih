<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = Kelas::get();

        foreach ($kelas as $value) {
            for ($i=1; $i<=6; $i++) {
                DB::table('siswa')->insert([
                    'nama' => "Siswa Kelas {$value->nama} {$i}",
                    'nisn' => "123{$value->id}{$i}",
                    'username' => "123{$value->id}{$i}",
                    'email' => "123{$value->id}{$i}@example.com",
                    'password' => bcrypt("123{$value->id}{$i}"),
                    'kelas_id' => $value->id,
                ]);
            }
        }
    }
}
