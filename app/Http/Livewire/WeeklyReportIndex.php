<?php

namespace App\Http\Livewire;

use App\Exports\ReportAbsensiExcel;
use App\Models\Kelas;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class WeeklyReportIndex extends Component
{
    public $startDate;
    public $endDate;
    public $search;
    public $limit;

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfWeek()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfWeek()->format('Y-m-d');
    }
    public function getWeeklyReportsProperty()
    {
        $kelas = Kelas::search($this->search, auth()->user()->kelas_id)->get();
        $request['startDate'] = $this->startDate;
        $request['endDate'] = $this->endDate;
        $data = (new Kelas())->getReportAbsensi($kelas, 'mingguan', $request);

        return $data;
    }

    public function cetak()
    {
        $request['startDate'] = $this->startDate;
        $request['endDate'] = $this->endDate;
        return Excel::download(new ReportAbsensiExcel($this->weeklyReports, 'Mingguan', $request), 'laporan_absensi_mingguan' . date('YmdHis') . '.xlsx');
    }

    public function render()
    {
        return view('livewire.weekly-report-index', [
            'weeklyReports' => $this->weeklyReports
        ]);
    }
}
