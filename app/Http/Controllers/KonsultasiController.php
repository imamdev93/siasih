<?php

namespace App\Http\Controllers;

use App\Http\Requests\KonsultasiRequest;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    public function index()
    {
        $query = Konsultasi::where('kelas_id', auth()->user()->kelas_id)->where('jenis', 'akademik');

        if (session()->get('role') == 'siswa') {
            $konsultasi = $query->where('siswa_id', auth()->user()->id);
        }

        $konsultasi = $query->get();
        $jenis = 'akademik';

        return view('konsultasi.index', compact('konsultasi', 'jenis'));
    }

    public function create()
    {
        $jenis = 'akademik';
        return view('konsultasi.tambah', compact('jenis'));
    }

    public function store(KonsultasiRequest $request)
    {
        DB::beginTransaction();
        try {
            Konsultasi::create($request->validated() + [
                'siswa_id' => auth()->user()->id,
                'kelas_id' => auth()->user()->kelas_id,
            ]);
            DB::commit();
            return redirect()->route('konsultasi.index')->with('success', 'Berhasil menyimpan data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function feedback($id)
    {
        $konsultasi = Konsultasi::find($id);
        $jenis = 'non akademik';
        return view('konsultasi.feedback', compact('konsultasi', 'jenis'));
    }


    public function storeFeedback(KonsultasiRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $konsultasi = Konsultasi::find($id);
            $konsultasi->update($request->validated());
            DB::commit();
            return redirect()->route('konsultasi.index')->with('success', 'Berhasil merubah data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function indexNonAkademik()
    {
        $query = Konsultasi::where('kelas_id', auth()->user()->kelas_id)->where('jenis', 'non_akademik');

        if (session()->get('role') == 'siswa') {
            $konsultasi = $query->where('siswa_id', auth()->user()->id);
        }

        $konsultasi = $query->get();
        $jenis = 'non akademik';

        return view('konsultasi.index', compact('konsultasi', 'jenis'));
    }

    public function createNonAkademik()
    {
        $jenis = 'non akademik';
        return view('konsultasi.tambah', compact('jenis'));
    }

    public function storeNonAkademik(KonsultasiRequest $request)
    {
        DB::beginTransaction();
        try {
            Konsultasi::create($request->validated() + [
                'siswa_id' => auth()->user()->id,
                'kelas_id' => auth()->user()->kelas_id,
                'jenis' => 'non_akademik'
            ]);
            DB::commit();
            return redirect()->route('konsultasi.nonAkademik.index')->with('success', 'Berhasil menyimpan data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function feedbackNonAkademik($id)
    {
        $konsultasi = Konsultasi::find($id);
        $jenis = 'non akademik';
        return view('konsultasi.feedback', compact('konsultasi', 'jenis'));
    }


    public function storeFeedbackNonAkademik(KonsultasiRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $konsultasi = Konsultasi::find($id);
            $konsultasi->update($request->validated());
            DB::commit();
            return redirect()->route('konsultasi.nonAkademik.index')->with('success', 'Berhasil merubah data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }
}
