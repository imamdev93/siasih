<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function dailyReport()
    {
        return view('laporan.harian');
    }

    public function weeklyReport()
    {
        return view('laporan.mingguan');
    }

    public function monthlyReport()
    {
        return view('laporan.bulanan');
    }

    public function semesterReport()
    {
        return view('laporan.semesteran');
    }
}
