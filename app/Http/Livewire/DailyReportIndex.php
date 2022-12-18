<?php

namespace App\Http\Livewire;

use App\Exports\ReportAbsensiExcel;
use App\Models\Kelas;
use Livewire\Component;
use PDF;
use Excel;

class DailyReportIndex extends Component
{
    public $filterDate;
    public $search;
    public $limit;

    public function mount()
    {
        $this->filterDate = date('Y-m-d');
    }
    public function getDailyReportsProperty()
    {
        $kelas = Kelas::search($this->search, auth()->user()->kelas_id)->get();

        $data = (new Kelas())->getReportAbsensi($kelas, 'harian', $this->filterDate);

        return $data;
    }

    public function cetak()
    {
        return Excel::download(new ReportAbsensiExcel($this->dailyReports, 'Harian', $this->filterDate), 'laporan_absensi_harian' . date('YmdHis') . '.xlsx');
    }

    public function render()
    {
        return view('livewire.daily-report-index', [
            'dailyReports' => $this->dailyReports
        ]);
    }
}
