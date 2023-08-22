<?php

namespace App\Http\Livewire;

use App\Models\Absensi;
use App\Models\Semester;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class ArsipAbsensiIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $semester;
    public $siswaId;
    protected $perPage = 10;

    public function getSiswaProperty()
    {
        $query = Siswa::query();

        if (session()->get('role') == 'siswa') {
            $query->where('id', auth()->user()->id);
        }

        if (session()->get('role') == 'guru') {
            $query->where('kelas_id', auth()->user()->kelas_id);
        }

        $siswa = $query->get();
        return $siswa;
    }

    public function render()
    {
        $query = Absensi::when($this->semester, function ($query) {
            $query->where('semester_id', $this->semester);
        })->when($this->search, function ($query) {
            $query->whereHas('siswa', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('nisn', 'like', '%' . $this->search . '%');
            });
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

        $data = $query->paginate($this->perPage);

        return view('livewire.arsip-absensi-index', [
            'absensi' => $data,
            'siswa' => $this->siswa,
            'semesters' => Semester::latest()->get()
        ]);
    }
}
