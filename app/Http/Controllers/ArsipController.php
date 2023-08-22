<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function absensi()
    {
        return view('arsip.absensi');
    }

    public function nilai()
    {
        return view('arsip.nilai');
    }
}
