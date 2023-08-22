<?php

namespace App\Http\Livewire;

use App\Models\Nilai;
use App\Models\Semester;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class ArsipNilaiIndex extends Component
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
            $query->where('semester_id', $this->semester);
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
        return view('livewire.arsip-nilai-index', [
            'raport' => $this->raport,
            'siswa' => $this->siswa,
            'semesters' => Semester::latest()->get()
        ]);
    }
}
