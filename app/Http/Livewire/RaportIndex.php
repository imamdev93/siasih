<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class RaportIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $semester;
    public $siswaId;
    protected $perPage = 10;

    public function getRaportProperty()
    {
        $query = Nilai::when($this->semester, function ($query) {
            $query->where('semester', $this->semester);
        })->when($this->search, function ($query) {
            $query->whereHas('siswa', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('nisn', 'like', '%' . $this->search . '%');
            })->orWhereHas('mapel', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })->orWhere('nilai', $this->search)
                ->orWhere('nilai', $this->search);
        })->when($this->siswaId, function ($query) {
            $query->where('siswa_id', $this->siswaId);
        });

        if (session()->get('role') == 'siswa') {
            $query->where('siswa_id', auth()->user()->id);
        } elseif (session()->get('role') == 'guru') {
            $query->whereHas('siswa', function ($query) {
                $query->where('kelas_id', auth()->user()->kelas_id);
            });
        }

        return $query->paginate($this->perPage);
    }

    public function getSiswaProperty()
    {
        $query = Siswa::query();

        if (session()->get('role') == 'guru') {
            $query->where('kelas_id', auth()->user()->kelas_id);
        }

        $siswa = $query->get();
        return $siswa;
    }

    public function cetak()
    {
        $siswaId = $this->siswaId ?? auth()->user()->id;
        $data['siswa'] = Siswa::find($siswaId);
        $data['waliKelas'] = Guru::where('kelas_id', $data['siswa']->id)->first();
        $data['semester'] = $this->semester;
        $data['raport'] = MataPelajaran::with(['nilai' => function ($query) use ($siswaId) {
            $query->where('semester', $this->semester)
                ->where('siswa_id', $siswaId);
        }])->get();
        $pdf = PDF::loadView('template.raport', $data)->setPaper('folio', 'potrait')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "raport_" . $data['siswa']->nama . '_' . date('Ymd') . ".pdf"
        );
    }

    public function render()
    {
        return view('livewire.raport-index', [
            'raport' => $this->raport,
            'siswa' => $this->siswa
        ]);
    }
}
