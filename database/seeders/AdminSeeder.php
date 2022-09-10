<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'nama' => 'Admin Guru',
            'username' => 'admin_guru',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123')
        ]);

        DB::table('admin')->insert([
            'nama' => 'Kepala Sekolah',
            'username' => 'kepala_sekolah',
            'email' => 'kepsek@example.com',
            'password' => bcrypt('kepsek123'),
            'is_kepsek' => true
        ]);
    }
}
