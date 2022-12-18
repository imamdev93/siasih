<?php

namespace App\Http\Livewire;

use App\Exports\ReportAbsensiExcel;
use App\Models\Kelas;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class MonthlyReportIndex extends Component
{
    public $month;
    public $search;
    public $limit;

    public function mount()
    {
        $this->month = Carbon::now()->format('m');
    }
    public function getMonthlyReportsProperty()
    {
        $kelas = Kelas::search($this->search, auth()->user()->kelas_id)->get();
        $data = (new Kelas())->getReportAbsensi($kelas, 'bulanan', $this->month);

        return $data;
    }

    public function cetak()
    {
        return Excel::download(new ReportAbsensiExcel($this->monthlyReports, 'Bulanan', $this->month), 'laporan_absensi_bulanan' . date('YmdHis') . '.xlsx');
    }

    public function render()
    {
        return view('livewire.monthly-report-index', [
            'monthlyReports' => $this->monthlyReports
        ]);
    }
}
