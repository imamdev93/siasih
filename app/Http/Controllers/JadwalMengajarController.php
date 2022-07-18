<?php

namespace App\Http\Controllers;

use App\Models\KelasMapel;
use Illuminate\Http\Request;

class JadwalMengajarController extends Controller
{
    public function index()
    {
        $query = KelasMapel::query();

        if (session()->get('role') != 'admin') {
            $query->where('kelas_id', auth()->user()->kelas_id);
        }

        $jadwal = $query->get();

        return view('jadwal.index', compact('jadwal'));
    }
}
