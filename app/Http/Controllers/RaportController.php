<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RaportController extends Controller
{
    public function index(Request $request)
    {
        return view('raport.index');
    }
}
