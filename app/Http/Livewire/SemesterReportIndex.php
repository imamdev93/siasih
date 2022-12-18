<?php

namespace App\Http\Livewire;

use App\Exports\ReportAbsensiExcel;
use App\Models\Kelas;
use App\Models\Semester;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class SemesterReportIndex extends Component
{
    public $filterSemester;
    public $search;
    public $limit;

    public function mount()
    {
        $this->filterSemester = Semester::latest()->first()->id ?? null;
    }
    public function getSemesterReportsProperty()
    {
        $kelas = Kelas::search($this->search, auth()->user()->kelas_id)->get();
        $data = (new Kelas())->getReportAbsensi($kelas, 'semester', $this->filterSemester);

        return $data;
    }

    public function cetak()
    {
        return Excel::download(new ReportAbsensiExcel($this->semesterReports, 'Semesteran', $this->filterSemester), 'laporan_absensi_semesteran' . date('YmdHis') . '.xlsx');
    }

    public function render()
    {
        return view('livewire.semester-report-index', [
            'semesterReports' => $this->semesterReports,
            'semester' => Semester::latest()->get()
        ]);
    }
}
