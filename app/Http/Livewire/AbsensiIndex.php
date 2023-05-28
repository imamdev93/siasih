<?php

namespace App\Http\Livewire;

use App\Models\Kelas;
use Livewire\Component;

class AbsensiIndex extends Component
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


    public function render()
    {
        return view('livewire.absensi-index', [
            'dailyReports' => $this->dailyReports
        ]);
    }
}
