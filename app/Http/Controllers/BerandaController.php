<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function __invoke()
    {
        $tahun = Siswa::select(DB::raw('YEAR(created_at) as tahun'))->whereNotNull('created_at')->groupBy(DB::raw('YEAR(created_at)'))->pluck('tahun')->toArray();

        $kelas = Kelas::get();
        $values = [];
        $siswa = [];
        
        foreach ($kelas as $kls) {
            foreach ($tahun as $key  => $thn) {
                $siswa[$key] = Siswa::whereYear('created_at', $thn)->where('kelas_id', $kls->id)->count();
            }
            array_push($values, array('name' => 'Kelas ' . $kls->romawi, 'data' => $siswa));
        }

        $data['labels'] = $tahun;
        $data['values'] = $values;

        return view('dashboard', $data);
    }
}
