<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
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
            $lower = strtolower($value->nama);
            DB::table('guru')->insert([
                'nama' =>  "Guru Kelas {$value->nama}",
                'username' => "guru_kelas_{$lower}",
                'email' => "gurukelas{$lower}@example.com",
                'password' => bcrypt('guru123'),
                'kelas_id' => $value->id,
            ]);
        }
        
    }
}
