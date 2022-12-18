<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportAbsensiExcel implements FromView, ShouldAutoSize
{
    public $data;
    public $tipe;
    public $request;

    public function __construct($data, $tipe, $request)
    {
        $this->data = $data;
        $this->tipe = $tipe;
        $this->request = $request;
    }

    public function view(): View
    {
        return view('template.absensi', [
            'reports' => $this->data,
            'tipe' => $this->tipe,
            'request' => $this->request
        ]);
    }
}
